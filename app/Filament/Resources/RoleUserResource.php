<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleUserResource\Pages;
use App\Filament\Resources\RoleUserResource\RelationManagers;
use App\Models\RoleUser;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RoleUserResource extends Resource
{
    protected static ?string $model = RoleUser::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Users & Roles';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
            ->label('User')
            ->relationship('user', 'full_name')  // Sử dụng relationship để lấy tên người dùng
            ->required()
            ->preload()
            ->searchable()  // Cho phép tìm kiếm trong danh sách
            ->placeholder('Select a user'),

            Forms\Components\Select::make('role_id')
            ->label('Role')
            ->relationship('role', 'name')  // Sử dụng relationship để lấy tên vai trò
            ->required()
            ->preload()
            ->searchable()  // Cho phép tìm kiếm trong danh sách
            ->placeholder('Select a role'),
            ])
            ;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('role_id')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListRoleUsers::route('/'),
            'create' => Pages\CreateRoleUser::route('/create'),
            'edit' => Pages\EditRoleUser::route('/{record}/edit'),
        ];
    }
}
