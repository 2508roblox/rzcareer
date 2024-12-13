<?php

namespace App\Filament\RecruiterPanel\Resources;

use App\Filament\RecruiterPanel\Resources\PaymentHistoryResource\Pages;
use App\Filament\RecruiterPanel\Resources\PaymentHistoryResource\RelationManagers;
use App\Models\PaymentHistory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentHistoryResource extends Resource
{
    protected static ?string $model = PaymentHistory::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationGroup = 'Quản lý dịch vụ';
    public static function getPluralModelLabel(): string
    {
        return 'Lịch sử thanh toán'; // Trả về tên số nhiều cho mô hình Company
    }
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('user_id')
                ->relationship('user', 'full_name') // Điều chỉnh theo cách định nghĩa quan hệ
                ->required(),
            Forms\Components\Select::make('invoice_id')
                ->relationship('invoice', 'invoice_code') // Điều chỉnh theo cách định nghĩa quan hệ
                ->required(),
            Forms\Components\TextInput::make('balance')->required()->numeric(),
            Forms\Components\TextInput::make('payment_method')->required(),
            Forms\Components\Select::make('status')
                ->options([
                    'Pending' => 'Pending',
                    'Completed' => 'Completed',
                    'Failed' => 'Failed',
                ])->required(),
            Forms\Components\DatePicker::make('payment_date')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('user.full_name')
                ->label('Tên người dùng'),

            Tables\Columns\TextColumn::make('invoice.invoice_code')
                ->label('Mã hóa đơn'),

            Tables\Columns\TextColumn::make('balance')
                ->label('Số dư')
                ->money('vnd', true), // Đơn vị VNĐ với hiển thị dạng tiền tệ

            Tables\Columns\TextColumn::make('payment_method')
                ->label('Phương thức thanh toán'),

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

            Tables\Columns\TextColumn::make('payment_date')
                ->label('Ngày thanh toán')
                ->date(),
        ])

            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPaymentHistories::route('/'),
            'create' => Pages\CreatePaymentHistory::route('/create'),
            'edit' => Pages\EditPaymentHistory::route('/{record}/edit'),
        ];
    }public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
