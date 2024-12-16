<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvoiceResource\Pages;
use App\Filament\Resources\InvoiceResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Invoice;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Quản lý dịch vụ';

    public static function getPluralModelLabel(): string
    {
        return 'Hóa đơn';
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin hóa đơn')
                    ->schema([
                        Forms\Components\Grid::make()
                            ->columns(2)
                            ->schema([
                                Forms\Components\TextInput::make('invoice_code')
                                    ->label('Mã hóa đơn')
                                    ->required(),
                                Forms\Components\Select::make('user_id')
                                    ->relationship('user', 'full_name')
                                    ->label('Người dùng')
                                    ->required(),
                            ]),
                    ]),
                Forms\Components\Section::make('Chi tiết thanh toán')
                    ->schema([
                        Forms\Components\Grid::make()
                            ->columns(2)
                            ->schema([
                                Forms\Components\TextInput::make('total_price')
                                    ->label('Tổng giá')
                                    ->required()
                                    ->numeric(),
                                Forms\Components\Select::make('status')
                                    ->options([
                                        'pending' => 'Đang chờ',
                                        'successful' => 'Thành công',
                                        'failed' => 'Thất bại',
                                    ])
                                    ->label('Trạng thái')
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
                    ->label('Mã hóa đơn'),
                    Tables\Columns\TextColumn::make('total_price')
                    ->money('vnd')
                    ->label('Tổng giá'),

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
                    ->date('d/m/Y')
                    ->label('Ngày tạo'),
            ])
            ->filters([
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('pay')
                    ->label('Thanh toán')
                    ->icon('heroicon-o-credit-card')
                    ->action(function (Invoice $record) {
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
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInvoices::route('/'),
            // 'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }
}
