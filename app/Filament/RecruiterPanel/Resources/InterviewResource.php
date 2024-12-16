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

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'Quản lý lịch phỏng vấn'; // Nhóm trong menu điều hướng
    public static function getPluralModelLabel(): string
    {
        return 'Buổi phỏng vấn'; // Trả về tên số nhiều cho mô hình Company
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông Tin Phỏng Vấn') // Section for Interview Information
                    ->schema([
                        Forms\Components\Select::make('candidate_id')
                            ->label('Người Dự Tuyển')
                            ->options(function () {
                                $userId = auth()->id();
                                $companyId = Company::where('user_id', $userId)->value('id');

                                return JobPost::where('company_id', $companyId)
                                    ->with('postActivities')
                                    ->get()
                                    ->flatMap(function ($jobPost) {
                                        return $jobPost->postActivities->map(function ($activity) {
                                            return [
                                                'id' => $activity->user_id,
                                                'name' => $activity->user->full_name . " - " . $activity->user->email,
                                            ];
                                        });
                                    })
                                    ->pluck('name', 'id');
                            })
                            ->searchable()
                            ->preload()
                            ->required(),

                        Forms\Components\Select::make('job_post_id')
                            ->label('Tên Công Việc')
                            ->options(function () {
                                $userId = auth()->id();
                                $companyId = Company::where('user_id', $userId)->value('id');

                                return JobPost::where('company_id', $companyId)
                                    ->whereHas('postActivities')
                                    ->pluck('job_name', 'id');
                            })
                            ->searchable()
                            ->required(),

                        Forms\Components\Select::make('slot_id')
                            ->label('Thời Gian Phỏng Vấn')
                            ->relationship('slot', 'start_time')
                            ->required(),

                        Forms\Components\TextInput::make('feedback')
                            ->label('Mô tả buổi phỏng vấn')
                            ->required(),
                    ]),

                Forms\Components\Section::make('Trạng Thái Phỏng Vấn') // Section for Interview Status
                    ->schema([
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
                                    PostActivity::where([
                                        'user_id' => $record->candidate_id,
                                        'job_post_id' => $record->job_post_id
                                    ])->update([
                                        'status' => $this->mapStatusToPostActivity($state)
                                    ]);

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
            Tables\Actions\ActionGroup::make([
                Tables\Actions\EditAction::make()
                    ->label('Chỉnh sửa'),
                Tables\Actions\ViewAction::make()
                    ->label('Xem'),
                Tables\Actions\DeleteAction::make()
                    ->label('Xóa'),
            ]),
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
