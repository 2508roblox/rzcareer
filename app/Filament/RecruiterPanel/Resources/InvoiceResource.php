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

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-document'; // Thay đổi biểu tượng
protected static ?string $navigationGroup = 'Quản lý dịch vụ';

public static function getPluralModelLabel(): string
{
    return 'Hóa đơn'; // Trả về tên số nhiều cho mô hình Company
}

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('invoice_code')->required(),
            Forms\Components\Select::make('user_id')
                ->relationship('user', 'full_name') // Điều chỉnh theo cách định nghĩa quan hệ
                ->required(),
            Forms\Components\TextInput::make('total_price')->required()->numeric(),
            Forms\Components\Select::make('status')
                ->options([
                    'pending' => 'Pending',
                    'successful' => 'Successful',
                    'failed' => 'Failed',
                ])->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('invoice_code'),
            Tables\Columns\TextColumn::make('total_price')->money('usd'),
            Tables\Columns\TextColumn::make('status'),
            Tables\Columns\TextColumn::make('created_at')->date(),
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
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
