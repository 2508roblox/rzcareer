<?php

namespace App\Filament\RecruiterPanel\Resources;

use App\Filament\RecruiterPanel\Resources\InterviewResource\Pages;
use App\Filament\RecruiterPanel\Resources\InterviewResource\Pages\CreateInterview;
use App\Filament\RecruiterPanel\Resources\InterviewResource\RelationManagers;
use App\Mail\InterviewConfirmationMail;
use App\Models\Company;
use App\Models\Interview;
use App\Models\InterviewSlot;
use App\Models\JobPost;
use App\Models\User;
use App\Models\PostActivity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Mail;

class InterviewResource extends Resource
{
    protected static ?string $model = Interview::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil';
    protected static ?string $navigationGroup = 'Quản lý lịch phỏng vấn'; // Nhóm trong menu điều hướng

    public static ?string $label = 'Buổi phỏng vấn'; // Nhãn hiển thị cho tài nguyên này
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2) // Chia layout thành 2 cột
                    ->schema([
                        Forms\Components\Select::make('candidate_id')
                        ->label('Người Dự Tuyển')
                        ->options(function () {
                            // Lấy công ty của người dùng hiện tại
                            $userId = auth()->id(); // Lấy user_id của người dùng hiện tại
                            $companyId = Company::where('user_id', $userId)->value('id'); // Lấy company_id

                            return JobPost::where('company_id', $companyId)
                                ->with('postActivities') // Eager load để lấy thông tin postActivities
                                ->get()
                                ->flatMap(function ($jobPost) {
                                    return $jobPost->postActivities->map(function ($activity) {
                                        return [
                                            'id' => $activity->user_id, // ID của user
                                            'name' => $activity->user->full_name . " - " . $activity->user->email, // Tên của ứng viên
                                        ];
                                    });
                                })
                                ->pluck('name', 'id'); // Trả về danh sách tên ứng viên
                        })
                        ->searchable()
                        ->preload()
                        ->required(),


                        Forms\Components\Select::make('job_post_id') // Thêm select để chọn job post
                        ->label('Tên Công Việc')
                        ->options(function (callable $get) {
                            // Lấy danh sách job posts thuộc công ty và có trong post activities
                            $userId = auth()->id(); // Lấy user_id của người dùng hiện tại
                            $companyId = Company::where('user_id', $userId)->value('id'); // Lấy company_id

                            return JobPost::where('company_id', $companyId)
                                ->whereHas('postActivities') // Chỉ lấy những job post có post activities
                                ->pluck('job_name', 'id'); // Trả về danh sách job posts
                        })
                        ->searchable()
                        ->required(),
                        Forms\Components\Select::make('slot_id')
                            ->label('Thời Gian Phỏng Vấn')
                            ->relationship('slot', 'start_time') // Lấy dữ liệu từ relationship 'slot'
                            ->required(),

                        Forms\Components\TextInput::make('feedback')
                            ->label('Phản Hồi')
                            ->required(),

                        Forms\Components\Select::make('status')
                            ->label('Trạng Thái')
                            ->options([
                                'scheduled' => 'Đã Lên Lịch',
                                'completed' => 'Hoàn Thành',
                                'canceled' => 'Đã Hủy',
                            ])
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function ($state, $record) {
                                if ($record) {
                                    // Update PostActivity status
                                    PostActivity::where([
                                        'user_id' => $record->candidate_id,
                                        'job_post_id' => $record->job_post_id
                                    ])->update([
                                        'status' => $this->mapStatusToPostActivity($state)
                                    ]);

                                    // Send email notification
                                    $this->sendInterviewStatusEmail($record, $state);
                                }
                            }),
                    ]),
            ]);
    }



    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('candidate.full_name') // Hiển thị tên ứng viên
                ->label('Người Dự Tuyển') // Tiêu đề cột
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('slot.start_time') // Hiển thị thời gian phỏng vấn
                ->label('Thời Gian Phỏng Vấn') // Tiêu đề cột
                ->dateTime()
                ->sortable(),

                Tables\Columns\TextColumn::make('jobPost.job_name') // Hiển thị tên công việc
                ->label('Tên Công Việc') // Tiêu đề cột
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('slot.interviewer.full_name') // Hiển thị tên người phỏng vấn
                ->label('Người Phỏng Vấn') // Tiêu đề cột
                ->sortable()
                ->searchable(),


            Tables\Columns\SelectColumn::make('status') // Hiển thị trạng thái phỏng vấn
                ->label('Trạng Thái') // Tiêu đề cột
                ->sortable()
                ->options([
                    'scheduled' => 'Đã Lên Lịch',
                    'completed' => 'Hoàn Thành',
                    'canceled' => 'Đã Hủy',
                ]),

            Tables\Columns\TextColumn::make('feedback') // Hiển thị phản hồi
                ->label('Phản Hồi') // Tiêu đề cột
                ->toggleable(), // Cho phép ẩn hiện cột
        ])
        ->filters([
            // Thêm các bộ lọc nếu cần
        ])
        ->actions([
            Tables\Actions\EditAction::make(), // Cho phép chỉnh sửa từng cuộc phỏng vấn
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(), // Cho phép xóa nhiều cuộc phỏng vấn
            ]),
        ]);
}



    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInterviews::route('/'),
            'create' => Pages\CreateInterview::route('/create'),
            'edit' => Pages\EditInterview::route('/{record}/edit'),
        ];
    }
    
    private function mapStatusToPostActivity($status)
    {
        return match ($status) {
            'scheduled' => 'Đã lên lịch phỏng vấn',
            'completed' => 'Đã phỏng vấn',
            'canceled' => 'Đã hủy phỏng vấn',
            default => 'Chờ xác nhận',
        };
    }

    private function sendInterviewStatusEmail($interview, $status)
    {
        try {
            $candidate = $interview->candidate;
            $jobPost = $interview->jobPost;
            $slot = $interview->slot;

            Mail::to($candidate->email)->send(new InterviewConfirmationMail(
                $candidate->full_name,
                $jobPost->job_name,
                $slot->start_time,
                $slot->interviewer->full_name,
                $status
            ));
        } catch (\Exception $e) {
            \Log::error('Failed to send interview status email: ' . $e->getMessage());
        }
    }
}
