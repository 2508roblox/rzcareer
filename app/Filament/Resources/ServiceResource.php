<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Quản lý dịch vụ'; // Ví dụ: "Quản lý dịch vụ"

    // Định nghĩa nhãn số nhiều cho mô hình
    public static function getPluralModelLabel(): string
    {
        return 'Dịch vụ'; // Nhãn số nhiều cho mô hình
    }
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            // Phần thông tin gói tuyển dụng
            Forms\Components\Section::make('Thông tin gói tuyển dụng')
                ->schema([
                    Forms\Components\Grid::make(2) // Layout 2 cột
                        ->schema([
                            Forms\Components\TextInput::make('package_name')
                                ->label('Tên gói tuyển dụng')
                                ->required()
                                ->helperText('Tên gói dịch vụ mà nhà tuyển dụng muốn mua'),
    
                                Forms\Components\FileUpload::make('illustration_image')
                                ->label('Ảnh minh họa')
                                ->image()  // Đảm bảo chỉ cho phép tải lên tệp ảnh
                                ->nullable()
                                ->helperText('Ảnh đại diện cho gói dịch vụ (không bắt buộc)'),
                            
                            Forms\Components\Textarea::make('description')
                                ->label('Mô tả')
                                ->nullable()
                                ->helperText('Mô tả chi tiết về gói tuyển dụng'),
    
                            Forms\Components\TextInput::make('price')
                                ->label('Giá tiền')
                                ->required()
                                ->numeric()
                                ->helperText('Giá tiền của gói tuyển dụng (yêu cầu nhập số)'),
    
                            Forms\Components\TextInput::make('duration')
                                ->label('Thời gian hiệu lực')
                                ->required()
                                ->numeric()
                                ->helperText('Thời gian hiệu lực của gói tuyển dụng (theo ngày, yêu cầu nhập số)'),
    
                            Forms\Components\TextInput::make('job_post_count')
                                ->label('Số lượng tin tuyển dụng')
                                ->required()
                                ->numeric()
                                ->helperText('Số lượng tin tuyển dụng mà nhà tuyển dụng có thể đăng với gói dịch vụ này'),
                        ]),
                ]),
    
            // Phần hiệu ứng và tính năng đi kèm
            Forms\Components\Section::make('Hiệu ứng và tính năng')
                ->schema([
                    Forms\Components\Grid::make(2) // Layout 2 cột
                        ->schema([
                            Forms\Components\Checkbox::make('highlight_post')
                                ->label('Bài viết nổi bật')
                                
                                ->helperText('Cho phép đánh dấu bài viết nổi bật'),
    
                            Forms\Components\Checkbox::make('top_sector')
                                ->label('Vị trí top trong ngành')
                                
                                ->helperText('Cho phép bài viết xuất hiện ở vị trí cao trong ngành'),
    
                            Forms\Components\Checkbox::make('border_effect')
                                ->label('Hiệu ứng viền')
                                
                                ->helperText('Thêm hiệu ứng viền nổi bật cho bài viết tuyển dụng'),
    
                            Forms\Components\Checkbox::make('hot_effect')
                                ->label('Hiệu ứng hot')
                                
                                ->helperText('Thêm hiệu ứng "Hot" cho bài viết để thu hút ứng viên'),
    
                            Forms\Components\Checkbox::make('highlight_logo')
                                ->label('Logo nổi bật')
                                
                                ->helperText('Cho phép logo của công ty được hiển thị nổi bật trên trang tuyển dụng'),
    
                            Forms\Components\Checkbox::make('homepage_banner')
                                ->label('Banner trên trang chủ')
                                
                                ->helperText('Cho phép hiển thị banner của công ty trên trang chủ'),
                        ]),
                ]),
        ]);
    }
    
    

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('package_name')
                ->label('Tên gói tuyển dụng')
                ->searchable(), // Thêm tính năng tìm kiếm
            
            Tables\Columns\TextColumn::make('price')
                ->label('Giá tiền')
                ->money('usd')
                ->searchable(), // Thêm tính năng tìm kiếm
            
            Tables\Columns\TextColumn::make('duration')
                ->label('Thời gian hiệu lực (ngày)')
                ->searchable(), // Thêm tính năng tìm kiếm
            
            Tables\Columns\TextColumn::make('created_at')
                ->label('Ngày tạo')
                ->date()
                ->searchable(), // Thêm tính năng tìm kiếm theo ngày
            
            Tables\Columns\TextColumn::make('updated_at')
                ->label('Ngày cập nhật')
                ->date()
                ->searchable(), // Thêm tính năng tìm kiếm theo ngày
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
                Tables\Actions\DeleteBulkAction::make()
                    ->label('Xóa'),
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
