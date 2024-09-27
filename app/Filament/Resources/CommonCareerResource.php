<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommonCareerResource\Pages;
use App\Filament\Resources\CommonCareerResource\RelationManagers;
use App\Models\CommonCareer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommonCareerResource extends Resource
{
    protected static ?int $navigationSort = 3;


    protected static ?string $model = CommonCareer::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Dữ liệu chung';
    public static function getPluralModelLabel(): string
    {
        return 'Nghề nghiệp chung'; // Nhãn số nhiều cho mô hình
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin chính')
                    ->description('Điền các thông tin liên quan đến ứng dụng')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Tên ứng dụng')
                            ->required()
                            ->maxLength(150)
                            ->placeholder('Nhập tên ứng dụng'),

                        Forms\Components\TextInput::make('icon_url')
                            ->label('URL biểu tượng')
                            ->required()
                            ->maxLength(300)
                            ->placeholder('Nhập URL biểu tượng'),

                        Forms\Components\TextInput::make('app_icon_name')
                            ->label('Tên biểu tượng ứng dụng')
                            ->required()
                            ->maxLength(50)
                            ->placeholder('Nhập tên biểu tượng ứng dụng'),
                    ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên ứng dụng')
                    ->searchable(),
                Tables\Columns\TextColumn::make('icon_url')
                    ->label('URL biểu tượng')
                    ->searchable(),
                Tables\Columns\TextColumn::make('app_icon_name')
                    ->label('Tên biểu tượng ứng dụng')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Ngày cập nhật')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListCommonCareers::route('/'),
            'create' => Pages\CreateCommonCareer::route('/create'),
            'edit' => Pages\EditCommonCareer::route('/{record}/edit'),
        ];
    }
}
