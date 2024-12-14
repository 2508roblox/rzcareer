<?php

namespace App\Filament\RecruiterPanel\Resources;

use App\Filament\RecruiterPanel\Resources\InvoiceResource\Pages;
use App\Filament\RecruiterPanel\Resources\InvoiceResource\RelationManagers;
use App\Models\Invoice;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-receipt-percent';
    protected static ?string $navigationGroup = 'Quản lý dịch vụ';

    public static function getPluralModelLabel(): string
    {
        return 'Hóa đơn'; // Trả về tên số nhiều cho mô hình Company
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin hóa đơn') // Tiêu đề section
                    ->schema([
                        Forms\Components\Grid::make() // Bắt đầu phần lưới
                            ->columns(2) // Đặt số cột là 2
                            ->schema([
                                Forms\Components\TextInput::make('invoice_code')
                                    ->label('Mã hóa đơn') // Tiêu đề cột bằng tiếng Việt
                                    ->required(),
                                Forms\Components\Select::make('user_id')
                                    ->relationship('user', 'full_name') // Điều chỉnh theo cách định nghĩa quan hệ
                                    ->label('Người dùng') // Tiêu đề cột bằng tiếng Việt
                                    ->required(),
                            ]),
                    ]),
                Forms\Components\Section::make('Chi tiết thanh toán') // Tiêu đề section khác
                    ->schema([
                        Forms\Components\Grid::make() // Bắt đầu phần lưới
                            ->columns(2) // Đặt số cột là 2
                            ->schema([
                                Forms\Components\TextInput::make('total_price')
                                    ->label('Tổng giá') // Tiêu đề cột bằng tiếng Việt
                                    ->required()
                                    ->numeric(),
                                Forms\Components\Select::make('status')
                                    ->options([
                                        'pending' => 'Đang chờ', // Tiêu đề tiếng Việt
                                        'successful' => 'Thành công', // Tiêu đề tiếng Việt
                                        'failed' => 'Thất bại', // Tiêu đề tiếng Việt
                                    ])
                                    ->label('Trạng thái') // Tiêu đề cột bằng tiếng Việt
                                    ->required(),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('invoice_code')
                    ->searchable()
                    ->sortable()
                    ->label('Mã hóa đơn'), // Tiêu đề bằng tiếng Việt
                Tables\Columns\TextColumn::make('total_price')
                    ->money('vnd') // Đổi từ 'usd' thành 'vnd'
                    ->label('Tổng giá'), // Tiêu đề bằng tiếng Việt

                    Tables\Columns\BadgeColumn::make('status')
                    ->label('Trạng thái thanh toán')
                    ->formatStateUsing(fn (string $state) => match ($state) {
                        'successful' => 'Thành công',
                        'pending' => 'Chờ xử lý',
                        default => $state,
                    })
                    ->colors([
                        'success' => 'successful',
                        'warning' => 'pending',
                    ]),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInvoices::route('/'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
