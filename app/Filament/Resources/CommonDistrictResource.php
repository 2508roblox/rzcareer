<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommonDistrictResource\Pages;
use App\Filament\Resources\CommonDistrictResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\CommonDistrict;

class CommonDistrictResource extends Resource
{
    protected static ?string $model = CommonDistrict::class;

    public static function getPluralModelLabel(): string
    {
        return 'Các quận, huyện chung'; // Nhãn số nhiều cho mô hình
    }

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';
    protected static ?string $navigationGroup = 'Dữ liệu chung';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin quận, huyện')
                    ->description('Vui lòng nhập thông tin chi tiết cho quận, huyện.') // Mô tả cho section
                    ->schema([ // Nội dung của section
                        Forms\Components\Select::make('city_id')
                            ->relationship('city', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->label('Thành phố')
                            ->placeholder('Chọn thành phố'),
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(150)
                            ->label('Tên quận, huyện')
                            ->placeholder('Nhập tên quận, huyện'),
                    ])
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('city.name')
                    ->numeric()
                    ->sortable()
                    ->label('Thành phố'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('Tên quận, huyện'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Ngày tạo'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Ngày cập nhật'),
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
            ])
            ->bulkActions([
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
            'index' => Pages\ListCommonDistricts::route('/'),
            'create' => Pages\CreateCommonDistrict::route('/create'),
            'edit' => Pages\EditCommonDistrict::route('/{record}/edit'),
        ];
    }
}
