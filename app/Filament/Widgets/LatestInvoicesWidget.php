<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\InvoiceResource;
use App\Models\Invoice;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestInvoicesWidget extends BaseWidget
{
    protected static ?string $heading = 'Hóa Đơn Mới Nhất'; // Đặt tiêu đề cho widget
    protected int | string | array $columnSpan = 'full'; // Đặt cột chiếm toàn bộ chiều rộng
    protected static ?int $sort = 30; // Đặt thứ tự sắp xếp cho widget

    public function table(Table $table): Table
    {
        return $table
            ->query(InvoiceResource::getEloquentQuery()) // Đảm bảo phương thức này trả về truy vấn đúng
            ->defaultPaginationPageOption(5) // Đặt trang mặc định cho phân trang
            ->defaultSort('created_at', 'desc') // Sắp xếp theo ngày tạo giảm dần
            ->columns([
                Tables\Columns\TextColumn::make('id')
                ->searchable()
                    ->label('ID'), // Tiêu đề bằng tiếng Việt
                Tables\Columns\TextColumn::make('invoice_code')
                ->searchable()
                    ->label('Mã hóa đơn'), // Tiêu đề bằng tiếng Việt
                Tables\Columns\TextColumn::make('total_price')
                    ->money('vnd')
                    ->label('Tổng giá'), // Tiêu đề bằng tiếng Việt
                Tables\Columns\TextColumn::make('status')
                    ->label('Trạng thái'), // Tiêu đề bằng tiếng Việt
                Tables\Columns\TextColumn::make('created_at')
                    ->date()
                    ->label('Ngày tạo'), // Tiêu đề bằng tiếng Việt
                Tables\Columns\TextColumn::make('updated_at')
                    ->date()
                    ->label('Ngày cập nhật') // Tiêu đề bằng tiếng Việt
                    ->toggleable(isToggledHiddenByDefault: true), // Cho phép ẩn/hiện cột này
            ])
            ->headerActions([
                // Thêm các hành động nếu cần
            ])
            ->actions([])
            ->filters([
                // Thêm bộ lọc nếu cần
            ]);
    }
}