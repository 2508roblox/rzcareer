<?php

namespace App\Filament\RecruiterPanel\Resources;

use App\Filament\RecruiterPanel\Resources\ShoppingCartResource\Pages;
use App\Filament\RecruiterPanel\Resources\ShoppingCartResource\RelationManagers;
use App\Models\ShoppingCart;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ShoppingCartResource extends Resource
{
    protected static ?string $model = ShoppingCart::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationGroup = 'Quản lý dịch vụ';
    public static function getPluralModelLabel(): string
    {
        return 'Giỏ hàng'; // Trả về tên số nhiều cho mô hình Company
    }
    
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
            Forms\Components\TextInput::make('quantity')
                ->required()
                ->integer()
                ->minValue(1),
            Forms\Components\TextInput::make('total_price')
                ->required()
                ->numeric(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('user.full_name'),
            Tables\Columns\TextColumn::make('service.package_name'), // Điều chỉnh theo quan hệ
            Tables\Columns\TextColumn::make('quantity'),
            Tables\Columns\TextColumn::make('total_price')->money('usd'),
            Tables\Columns\TextColumn::make('created_at')->dateTime(),
            Tables\Columns\TextColumn::make('updated_at')->dateTime(),
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
            'index' => Pages\ListShoppingCarts::route('/'),
            'create' => Pages\CreateShoppingCart::route('/create'),
            'edit' => Pages\EditShoppingCart::route('/{record}/edit'),
        ];
    }public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
