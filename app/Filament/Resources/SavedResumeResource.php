<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SavedResumeResource\Pages;
use App\Filament\Resources\SavedResumeResource\RelationManagers;
use App\Models\SavedResume;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SavedResumeResource extends Resource
{
    protected static ?string $model = SavedResume::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';
    protected static ?string $navigationGroup = 'Sơ yếu lý lịch & Mục đã lưu';
    public static function getPluralModelLabel(): string
    {
        return 'Các sơ yếu lý lịch đã lưu'; // Trả về tên số nhiều cho mô hình Company
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Phần chọn Sơ yếu lý lịch và Công ty
                Section::make('Thông tin Sơ yếu lý lịch và Công ty')
                    ->schema([
                        // Chọn sơ yếu lý lịch theo quan hệ
                        Select::make('resume_id')
                            ->label('Sơ yếu lý lịch')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->options(function () {
                                return \App\Models\Resume::all()->pluck('id', 'id')->toArray();
                            })
                            ->placeholder('Chọn Sơ yếu lý lịch')
                            ->hint('Chọn sơ yếu lý lịch liên quan đến mục này.'),

                        // Chọn công ty theo quan hệ
                        Select::make('company_id')
                            ->label('Công ty')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->options(function () {
                                return \App\Models\Company::all()->pluck('company_name', 'id')->toArray();
                            })
                            ->placeholder('Chọn Công ty')
                            ->hint('Chọn công ty liên quan đến mục này.'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Hiển thị tên sơ yếu lý lịch thay vì ID
                Tables\Columns\TextColumn::make('resume.id') // Điều chỉnh tên trường thực tế
                    ->label('ID Sơ yếu lý lịch')
                    ->sortable()
                    ->searchable(),

                // Hiển thị tên công ty thay vì ID
                Tables\Columns\TextColumn::make('company.company_name') // Điều chỉnh tên trường thực tế
                    ->label('Tên Công ty')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Ngày tạo')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->label('Ngày cập nhật')
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
            'index' => Pages\ListSavedResumes::route('/'),
            'create' => Pages\CreateSavedResume::route('/create'),
            'edit' => Pages\EditSavedResume::route('/{record}/edit'),
        ];
    }
}
