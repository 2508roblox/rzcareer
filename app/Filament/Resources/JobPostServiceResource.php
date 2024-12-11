<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobPostServiceResource\Pages;
use App\Filament\Resources\JobPostServiceResource\RelationManagers;
use App\Models\JobPost;
use App\Models\JobPostService;
use App\Models\PurchasedService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JobPostServiceResource extends Resource
{
    protected static ?string $model = JobPostService::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Công ty & Công việc'; // Nếu cần thiết, thêm nhóm navigation

    public static function getPluralModelLabel(): string
    {
        return 'Dịch vụ Công việc'; // Trả về tên số nhiều cho mô hình JobPostService
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin dịch vụ') // Tên section
                    ->schema([
                        Forms\Components\Select::make('purchased_service_id')
                            ->options(function () {
                                return PurchasedService::whereHas('invoice', function ($query) {
                                    $query->where('status', 'successful');
                                })
                                    ->with('service')
                                    ->get()
                                    ->mapWithKeys(function ($purchasedService) {
                                        $label = $purchasedService->service->package_name . ' - ' . $purchasedService->id ?? 'Unknown';
                                        return [$purchasedService->id => $label];
                                    });
                            })
                            ->required()
                            ->unique()
                            ->label('Dịch vụ đã mua')
                            ->afterStateUpdated(function ($state, callable $set) {
                                $purchasedService = PurchasedService::find($state);

                                if ($purchasedService) {
                                    $set('max_jobs', $purchasedService->quantity);
                                }
                            }),
                    ]),

                Forms\Components\Section::make('Danh sách công việc') // Tên section thứ hai
                    ->schema([
                        Forms\Components\Select::make('list_jobs')
                            ->multiple()
                            ->label('Danh sách công việc') // Điều chỉnh nhãn nếu cần
                            ->required()
                            ->preload()
                            ->options(function () {
                                $userId = auth()->id(); // Lấy user_id của người dùng hiện tại
                                return JobPost::where('user_id', $userId) // Chỉ lấy job posts của người dùng hiện tại
                                    ->pluck('job_name', 'id'); // Điều chỉnh 'job_name' cho trường hiển thị phù hợp
                            })
                            ->maxItems(fn($get) => $get('max_jobs')), // Giới hạn số lượng chọn
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('purchased_service_id')
                    ->label('Mã Dịch Vụ Đã Mua'), // Thêm nhãn cho cột purchased_service_id

                Tables\Columns\TextColumn::make('list_jobs')
                    ->label('Danh Sách Công Việc'), // Thêm nhãn cho cột list_jobs

                Tables\Columns\TextColumn::make('purchasedService.expiration_date') // Sử dụng tên mối quan hệ
                    ->label('Ngày Hết Hạn') // Thêm nhãn cho cột expiration_date
                    ->dateTime(), // Đảm bảo hiển thị dưới dạng ngày
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Chỉnh Sửa'), // Việt hóa nút chỉnh sửa
                Tables\Actions\DeleteAction::make()
                    ->label('Xóa') // Việt hóa nút xóa
                    ->requiresConfirmation() // Yêu cầu xác nhận trước khi xóa
                    ->color('danger'), // Đổi màu nút xóa để nổi bật
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJobPostServices::route('/'),
        ];
    }
}
