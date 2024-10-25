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
use Illuminate\Support\Facades\Storage;

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
            // Cột 1: Ảnh đại diện của ứng viên
            Tables\Columns\ImageColumn::make('user.avatar_url')
                ->label('Ảnh đại diện')
                ->size(50)
                ->circular()
                ->getStateUsing(function ($record) {
                    return $record->resume->user->avatar_url ? asset(Storage::url($record->resume->user->avatar_url)) : null;
                }),

            // Cột 2: Thông tin cơ bản của ứng viên
            Tables\Columns\TextColumn::make('resume.seekerProfile')
                ->label('Thông tin cơ bản')
                ->formatStateUsing(function ($state, SavedResume $record) {
                    return $record->resume->seekerProfile ? // Giả sử bạn có quan hệ này
                        "Tên: {$record->resume->seekerProfile->user->full_name}<br>" .
                        "Năm sinh: {$record->resume->seekerProfile->birthday}<br>" .
                        "Địa chỉ: {$record->resume->seekerProfile->current_residence}<br>" .
                        "Lương mong muốn: {$record->resume->seekerProfile->expected_salary_min} - {$record->resume->seekerProfile->expected_salary_max} VNĐ"
                        : 'Chưa có thông tin';
                })
                ->html() // Cho phép hiển thị HTML
                ->searchable(),

            // Cột 3: Học vấn (degree name)
            Tables\Columns\TextColumn::make('resume.educationDetails')
                ->label('Học vấn')
                ->formatStateUsing(function ($state, SavedResume $record) {
                    return $record->resume->educationDetails->pluck('degree_name')->implode('<br>');
                })
                ->html()
                ->searchable(),

            // Cột 4: Kinh nghiệm làm việc (company name)
            Tables\Columns\TextColumn::make('resume.experienceDetails')
                ->label('Kinh nghiệm làm việc')
                ->formatStateUsing(function ($state, SavedResume $record) {
                    return $record->resume->experienceDetails->pluck('company_name')->implode('<br>');
                })
                ->html()
                ->searchable(),

            // Cột 5: Kỹ năng (skill name)
            Tables\Columns\TextColumn::make('resume.advancedSkills')
                ->label('Kỹ năng chuyên môn')
                ->formatStateUsing(function ($state, SavedResume $record) {
                    return $record->resume->advancedSkills->pluck('name')->implode('<br>');
                })
                ->html()
                ->searchable(),

            // Cột 6: Ngôn ngữ (language name)
            Tables\Columns\TextColumn::make('resume.languageSkills')
                ->label('Ngôn ngữ')
                ->formatStateUsing(function ($state, SavedResume $record) {
                    return $record->resume->languageSkills->pluck('language')->implode('<br>');
                })
                ->html()
                ->searchable(),

            // Cột 7: Thời gian tạo
            Tables\Columns\TextColumn::make('created_at')
                ->label('Thời gian tạo')
                ->dateTime()
                ->sortable(),
        ])
        ->filters([
            // Thêm bộ lọc nếu cần
        ])
        ->actions([
            // Thêm các action cần thiết
            Tables\Actions\ActionGroup::make([
                Tables\Actions\ViewAction::make()
                    ->label('Xem'),
                Tables\Actions\DeleteAction::make()
                    ->label('Xóa'),
            ]),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make()
                ->label('Xóa hồ sơ đã lưu'), // Nhãn cho bulk action
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
