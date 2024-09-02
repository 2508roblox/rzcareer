<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PermissionRoleResource\Pages;
use App\Filament\Resources\PermissionRoleResource\RelationManagers;
use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\Role;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PermissionRoleResource extends Resource
{
    protected static ?string $model = PermissionRole::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-check';
    protected static ?string $navigationGroup = 'Permissions';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('role_id')
                ->label('Role')
                ->searchable()
                ->options(Role::all()->pluck('name', 'id')->toArray()) // Tạo danh sách tùy chọn từ bảng roles
                ->required(),

            Forms\Components\Select::make('permission_id')
                ->label('Permission')
                ->searchable()
                ->options(Permission::all()->pluck('name', 'id')->toArray()) // Tạo danh sách tùy chọn từ bảng permissions
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('role_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('permission_id')
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
            'index' => Pages\ListPermissionRoles::route('/'),
            'create' => Pages\CreatePermissionRole::route('/create'),
            'edit' => Pages\EditPermissionRole::route('/{record}/edit'),
        ];
    }
}
