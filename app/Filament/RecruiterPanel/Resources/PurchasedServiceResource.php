<?php
//*** */ chỉ cho phép xem, không tạo và sửa

namespace App\Filament\RecruiterPanel\Resources;

use App\Filament\RecruiterPanel\Resources\PurchasedServiceResource\Pages;
use App\Filament\RecruiterPanel\Resources\PurchasedServiceResource\RelationManagers;
use App\Models\PurchasedService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PurchasedServiceResource extends Resource
{
    protected static ?string $model = PurchasedService::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'full_name') // Điều chỉnh theo cách định nghĩa quan hệ
                    ->required(),
                Forms\Components\Select::make('service_id')
                    ->relationship('service', 'package_name') // Điều chỉnh theo cách định nghĩa quan hệ
                    ->required(),
                Forms\Components\Select::make('invoice_id')
                    ->relationship('invoice', 'invoice_code') // Điều chỉnh theo cách định nghĩa quan hệ
                    ->required(),
                Forms\Components\DatePicker::make('purchase_date')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('user.name'),
            Tables\Columns\TextColumn::make('service.package_name'),
            Tables\Columns\TextColumn::make('invoice.invoice_code'),
            Tables\Columns\TextColumn::make('purchase_date')->date(),
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
            'index' => Pages\ListPurchasedServices::route('/'),
            'create' => Pages\CreatePurchasedService::route('/create'),
            'edit' => Pages\EditPurchasedService::route('/{record}/edit'),
        ];
    }
}
