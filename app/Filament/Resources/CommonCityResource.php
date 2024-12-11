<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommonCityResource\Pages;
use App\Filament\Resources\CommonCityResource\RelationManagers;
use App\Models\CommonCity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommonCityResource extends Resource
{
    protected static ?string $model = CommonCity::class;
    public static function getPluralModelLabel(): string
    {
        return 'Các thành phố chung'; // Nhãn số nhiều cho mô hình
    }

    protected static ?string $navigationIcon = 'heroicon-o-map';
    protected static ?string $navigationGroup = 'Dữ liệu chung';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin thành phố') // Thêm tiêu đề cho section
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(30)
                            ->label('Tên thành phố') // Nhãn tiếng Việt cho trường
                            ->placeholder('Nhập tên thành phố'), // Placeholder tiếng Việt
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('Tên thành phố'), // Thêm nhãn tiếng Việt cho cột
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Ngày tạo'), // Thêm nhãn tiếng Việt cho cột
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Ngày cập nhật'), // Thêm nhãn tiếng Việt cho cột
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make()
                        ->label('Chỉnh sửa'),
                    Tables\Actions\ViewAction::make()
                        ->label('Xem'),
                    Tables\Actions\DeleteAction::make()
                        ->label('Xóa'),
                ]),
            ])->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Xóa'),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCommonCities::route('/'),
            'create' => Pages\CreateCommonCity::route('/create'),
            'edit' => Pages\EditCommonCity::route('/{record}/edit'),
        ];
    }
}
