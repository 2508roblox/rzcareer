<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommonLocationResource\Pages;
use App\Filament\Resources\CommonLocationResource\RelationManagers;
use App\Models\CommonLocation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CommonLocationResource extends Resource
{
    protected static ?string $model = CommonLocation::class;

    public static function getPluralModelLabel(): string
    {
        return 'Các địa điểm chung'; // Nhãn số nhiều cho mô hình
    }

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';
    protected static ?string $navigationGroup = 'Dữ liệu chung';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin địa điểm') // Tiêu đề cho section
                    ->description('Vui lòng nhập thông tin chi tiết cho địa điểm.') // Mô tả cho section
                    ->schema([ // Nội dung của section
                        Forms\Components\TextInput::make('address')
                            ->required()
                            ->maxLength(255)
                            ->label('Địa chỉ') // Nhãn tiếng Việt cho trường address
                            ->placeholder('Nhập địa chỉ'), // Placeholder tiếng Việt
                        Forms\Components\TextInput::make('lat')
                            ->required()
                            ->numeric()
                            ->label('Vĩ độ') // Nhãn tiếng Việt cho trường lat
                            ->placeholder('Nhập vĩ độ'), // Placeholder tiếng Việt
                        Forms\Components\TextInput::make('lng')
                            ->required()
                            ->numeric()
                            ->label('Kinh độ') // Nhãn tiếng Việt cho trường lng
                            ->placeholder('Nhập kinh độ'), // Placeholder tiếng Việt
                        Forms\Components\Select::make('district_id')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->relationship('district', 'name')
                            ->label('Quận') // Nhãn tiếng Việt cho trường district_id
                            ->placeholder('Chọn quận'), // Placeholder tiếng Việt
                        Forms\Components\Select::make('city_id')
                            ->required()
                            ->preload()
                            ->searchable()
                            ->relationship('city', 'name')
                            ->label('Thành phố') // Nhãn tiếng Việt cho trường city_id
                            ->placeholder('Chọn thành phố'), // Placeholder tiếng Việt
                    ])
                    ->collapsible() // Cho phép đóng/mở section
                    ->collapsed() // Bắt đầu với section đóng (bỏ qua nếu bạn muốn mở mặc định)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('address')
                    ->searchable()
                    ->label('Địa chỉ'), // Nhãn tiếng Việt cho cột address
                Tables\Columns\TextColumn::make('lat')
                    ->numeric()
                    ->sortable()
                    ->label('Vĩ độ'), // Nhãn tiếng Việt cho cột lat
                Tables\Columns\TextColumn::make('lng')
                    ->numeric()
                    ->sortable()
                    ->label('Kinh độ'), // Nhãn tiếng Việt cho cột lng
                Tables\Columns\TextColumn::make('district_id')
                    ->numeric()
                    ->sortable()
                    ->label('ID Quận'), // Nhãn tiếng Việt cho cột district_id
                Tables\Columns\TextColumn::make('city_id')
                    ->numeric()
                    ->sortable()
                    ->label('ID Thành phố'), // Nhãn tiếng Việt cho cột city_id
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Ngày tạo'), // Nhãn tiếng Việt cho cột created_at
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Ngày cập nhật'), // Nhãn tiếng Việt cho cột updated_at
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
