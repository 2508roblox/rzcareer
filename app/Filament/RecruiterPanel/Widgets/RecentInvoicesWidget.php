<?php

namespace App\Filament\RecruiterPanel\Widgets;

use App\Filament\RecruiterPanel\Resources\InvoiceResource;
use App\Models\Invoice;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentInvoicesWidget extends BaseWidget
{
    protected static ?string $heading = 'Hóa Đơn Mới Nhất'; // Tiêu đề widget
    protected int | string | array $columnSpan = 'full'; // Chiếm toàn bộ chiều rộng

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->query(InvoiceResource::getEloquentQuery()) // Đảm bảo phương thức này trả về truy vấn đúng
            ->defaultPaginationPageOption(5) // Đặt trang mặc định cho phân trang
            ->defaultSort('created_at', 'desc') // Sắp xếp theo ngày tạo giảm dần
            ->columns([
                Tables\Columns\TextColumn::make('invoice_code')
                ->searchable()
                    ->label('Mã hóa đơn'), // Tiêu đề bằng tiếng Việt
                Tables\Columns\TextColumn::make('total_price')
                    ->money('usd')
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
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('pay')
                    ->label('Thanh toán')
                    ->icon('heroicon-o-credit-card')
                    ->action(function (Invoice $record) {
                        // Redirect to the specified URL
                        return redirect()->to('/employer/order/' . $record->invoice_code);
                    })
                    ->visible(fn (Invoice $record) => $record->status === 'pending'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}