<?php

namespace App\Filament\RecruiterPanel\Resources;

use App\Filament\RecruiterPanel\Resources\SavedResumeResource\Pages;
use App\Filament\RecruiterPanel\Resources\SavedResumeResource\RelationManagers;
use App\Models\SavedResume;
use Filament\Forms;
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
    protected static ?string $navigationGroup = 'Quản lý công ty';

    public static function getPluralModelLabel(): string
    {
        return 'Hồ sơ đã lưu'; // Trả về tên số nhiều cho mô hình Company
    }
    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\Section::make('Thông tin hồ sơ')
                ->schema([
                    Forms\Components\Select::make('resume_id')
                        ->label('ID Hồ sơ')
                        ->required()
                        ->relationship('resume', 'id')
                        ->searchable(),
                ]),
                
            Forms\Components\Section::make('Thông tin công ty')
                ->schema([
                    Forms\Components\Select::make('company_id')
                        ->label('ID Công ty')
                        ->required()
                        ->relationship('company', 'company_name')
                        ->searchable(),
                ]),
                
            // Bạn có thể thêm các section khác ở đây nếu cần
        ]);
}

    
public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('resume_id')
                ->label('ID Hồ sơ') // Tiêu đề cột bằng tiếng Việt
                ->numeric()
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('company_id')
                ->label('ID Công ty') // Tiêu đề cột bằng tiếng Việt
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Thời gian tạo') // Tiêu đề cột bằng tiếng Việt
                ->dateTime()
                ->sortable(),
       
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
