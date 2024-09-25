<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ViewedResumeResource\Pages;
use App\Filament\Resources\ViewedResumeResource\RelationManagers;
use App\Models\ViewedResume;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ViewedResumeResource extends Resource
{
    protected static ?string $model = ViewedResume::class;

    protected static ?string $navigationIcon = 'heroicon-o-eye';
    protected static ?string $navigationGroup = 'Hồ Sơ & Lượt Xem';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin hồ sơ')
                    ->description('Nhập thông tin chi tiết cho hồ sơ đã xem.')
                    ->schema([
                        Forms\Components\Select::make('company_id')
                            ->required()
                            ->label('Mã công ty')
                            ->relationship('company', 'company_name') // Assuming 'name' is the field to display
                            ->placeholder('Chọn công ty'),
                        Forms\Components\Select::make('resume_id')
                            ->required()
                            ->label('Mã hồ sơ')
                            ->relationship('resume', 'title') // Assuming 'title' is the field to display
                            ->placeholder('Chọn hồ sơ'),
                        Forms\Components\TextInput::make('views')
                            ->required()
                            ->numeric()
                            ->label('Số lượt xem'),
                    ]),

            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company_id')
                    ->numeric()
                    ->sortable()
                    ->label('Mã công ty'),
                Tables\Columns\TextColumn::make('resume_id')
                    ->numeric()
                    ->sortable()
                    ->label('Mã hồ sơ'),
                Tables\Columns\TextColumn::make('views')
                    ->numeric()
                    ->sortable()
                    ->label('Số lượt xem'),
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

    public static function getPluralModelLabel(): string
    {
        return 'Hồ sơ đã xem';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListViewedResumes::route('/'),
            'create' => Pages\CreateViewedResume::route('/create'),
            'edit' => Pages\EditViewedResume::route('/{record}/edit'),
        ];
    }
}
