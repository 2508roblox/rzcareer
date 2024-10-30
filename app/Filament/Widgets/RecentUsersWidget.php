<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Tables\Actions\Action;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentUsersWidget extends BaseWidget
{
    protected static ?string $heading = 'Người Dùng Mới Nhất'; // Đặt tiêu đề cho widget
    protected int | string | array $columnSpan = 'full'; // Đặt cột chiếm toàn bộ chiều rộng
    protected static ?int $sort = 10; // Đặt thứ tự sắp xếp cho widget

    public function table(Table $table): Table
    {
        return $table
            ->query(UserResource::getEloquentQuery()) // Đảm bảo phương thức này trả về truy vấn đúng
            ->defaultPaginationPageOption(5) // Đặt trang mặc định cho phân trang
            ->defaultSort('created_at', 'desc') // Sắp xếp theo ngày tạo giảm dần
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('full_name')
                    ->label('Họ Tên')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày Tạo')
                    ->dateTime(),
            ])
            ->headerActions([
                // Thêm các hành động nếu cần
            ])
            ->actions([
           
            ])
            ->filters([
                // Thêm bộ lọc nếu cần
            ]);
    }
}