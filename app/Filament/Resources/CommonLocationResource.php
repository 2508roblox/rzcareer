<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommonLocationResource\Pages;
use App\Filament\Resources\CommonLocationResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\CommonLocation;


class CommonLocationResource extends Resource
{
    protected static ?string $model = CommonLocation::class;

    public static function getPluralModelLabel(): string
    {
        return 'Các địa điểm chung';
    }

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';
    protected static ?string $navigationGroup = 'Dữ liệu chung';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin địa điểm')
                    ->description('Vui lòng nhập thông tin chi tiết cho địa điểm.')
                    ->schema([
                        Forms\Components\TextInput::make('address')
                            ->required()
                            ->maxLength(255)
                            ->label('Địa chỉ')
                            ->placeholder('Nhập địa chỉ'),
                        Forms\Components\TextInput::make('lat')
                            ->required()
                            ->numeric()
                            ->label('Vĩ độ')
                            ->placeholder('Nhập vĩ độ'),
                        Forms\Components\TextInput::make('lng')
                            ->required()
                            ->numeric()
                            ->label('Kinh độ')
                            ->placeholder('Nhập kinh độ'),
                        Forms\Components\Select::make('district_id')
                            ->relationship('district', 'name')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->label('Quận, huyện')
                            ->placeholder('Chọn quận, huyện'),
                        Forms\Components\Select::make('city_id')
                            ->required()
                            ->preload()
                            ->searchable()
                            ->relationship('city', 'name')
                            ->label('Thành phố')
                            ->placeholder('Chọn thành phố'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('address')
                    ->searchable()
                    ->label('Địa chỉ'),
                Tables\Columns\TextColumn::make('lat')
                    ->numeric()
                    ->sortable()
                    ->label('Vĩ độ'),
                Tables\Columns\TextColumn::make('lng')
                    ->numeric()
                    ->sortable()
                    ->label('Kinh độ'),
                Tables\Columns\TextColumn::make('district.name')
                    ->numeric()
                    ->sortable()
                    ->label('Quận, huyện'),
                Tables\Columns\TextColumn::make('city.name')
                    ->numeric()
                    ->sortable()
                    ->label('Thành phố'),
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
            'index' => Pages\ListCommonLocations::route('/'),
            'create' => Pages\CreateCommonLocation::route('/create'),
            'edit' => Pages\EditCommonLocation::route('/{record}/edit'),
        ];
    }
}
