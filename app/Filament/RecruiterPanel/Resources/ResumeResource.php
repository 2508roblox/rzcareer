<?php

namespace App\Filament\RecruiterPanel\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Resume;
use App\Models\Company;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\SavedResume;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\RecruiterPanel\Resources\ResumeResource\Pages;
use App\Filament\RecruiterPanel\Resources\ResumeResource\RelationManagers;
use Filament\Tables\Filters\Filter;

class ResumeResource extends Resource
{
    protected static ?string $model = Resume::class;

    protected static ?string $navigationIcon = 'heroicon-o-magnifying-glass'; // Thay icon phù hợp

    protected static ?string $navigationLabel = 'Tìm kiếm ứng viên'; // Thay tên resource
    protected static ?string $navigationGroup = 'Tìm kiếm ứng viên';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Title')
                    ->required(),
                Forms\Components\TextInput::make('slug')
                    ->label('Slug'),
                Forms\Components\TextInput::make('position')
                    ->label('Position'),
                Forms\Components\TextInput::make('salary_min')
                    ->label('Minimum Salary'),
                Forms\Components\Select::make('career_id')
                    ->relationship('career', 'name')
                    ->label('Career')
                    ->required(),
                Forms\Components\Select::make('city_id')
                    ->relationship('city', 'name')
                    ->label('City'),
                Forms\Components\Textarea::make('description')
                    ->label('Description'),
                // Add more fields as needed
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
                    return $record->user->avatar_url ? asset(Storage::url($record->user->avatar_url)) : null;
                }),



            // Cột 2: Thông tin cơ bản của ứng viên

                Tables\Columns\TextColumn::make('seekerProfile')
                ->label('Thông tin cơ bản')
                ->formatStateUsing(function ($state, Resume $record) {
                    return $record->seekerProfile ?
                        "Tên: {$record->seekerProfile->user->full_name}<br>" .
                        "Năm sinh: {$record->seekerProfile->birthday}<br>" .
                        "Địa chỉ: {$record->seekerProfile->current_residence}<br>" .
                        "Lương mong muốn: {$record->seekerProfile->expected_salary_min} - {$record->seekerProfile->expected_salary_max} VNĐ"
                        : 'Chưa có thông tin';
                })

                ->html(), // Cho phép hiển thị HTML


            // Cột 3: Học vấn (degree name)
            Tables\Columns\TextColumn::make('educationDetails')
            ->label('Học vấn')
            ->formatStateUsing(function ($state, Resume $record) {
                // Tạo icon SVG
                $icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6" style="vertical-align: middle;">
                            <path d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002c-.114.06-.227.119-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.173v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z" />
                            <path d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286.921.304 1.83.634 2.726.99v1.27a1.5 1.5 0 0 0-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.66a6.727 6.727 0 0 0 .551-1.607 1.5 1.5 0 0 0 .14-2.67v-.645a48.549 48.549 0 0 1 3.44 1.667 2.25 2.25 0 0 0 2.12 0Z" />
                            <path d="M4.462 19.462c.42-.419.753-.89 1-1.395.453.214.902.435 1.347.662a6.742 6.742 0 0 1-1.286 1.794.75.75 0 0 1-1.06-1.06Z" />
                        </svg>';

                // Kết hợp icon với tên bằng cấp
                return $record->educationDetails->pluck('degree_name')->map(function($degree) use ($icon) {
                    return $icon . '⦿ ' . $degree; // Thêm icon trước tên bằng cấp
                })->implode('<br>'); // Kết hợp các dòng lại với nhau
            })

            ->html(),




            // Cột 4: Kinh nghiệm làm việc (company name)
            Tables\Columns\TextColumn::make('experienceDetails')
            ->label('Kinh nghiệm làm việc')
            ->formatStateUsing(function ($state, Resume $record) {
                return $record->experienceDetails->pluck('company_name')->map(function($exprience)   {
                    return  '⦿ ' . $exprience; // Thêm icon trước tên bằng cấp
                })->implode('<br>');
            })
            ->html(),


            // Cột 5: Kỹ năng (skill name)
            Tables\Columns\TextColumn::make('advancedSkills')
            ->label('Kỹ năng chuyên môn')
            ->formatStateUsing(function ($state, Resume $record) {
                return $record->advancedSkills->pluck('name')->implode('<br>');
            })
            ->html(),



            // Cột 6: Ngôn ngữ (language name)
            Tables\Columns\TextColumn::make('languageSkills')
            ->label('Ngôn ngữ')
            ->formatStateUsing(function ($state, Resume $record) {
                return $record->languageSkills->pluck('language')->implode('<br>');
            })
            ->html(),

        ])
        ->filters([
            // Thêm bộ lọc nếu cần
        ])
        ->actions([
                Action::make('saveResume')
                    ->label('Lưu hồ sơ')
                    ->action(function ($record) {
                        // Lấy company_id dựa vào user_id
                        $companyId = Company::where('user_id', auth()->id())->value('id');

                        // Kiểm tra xem hồ sơ đã được lưu hay chưa
                        $existingSavedResume = SavedResume::where('resume_id', $record->id)
                                                           ->where('company_id', $companyId)
                                                           ->first();

                        if (!$existingSavedResume) {
                            // Nếu chưa lưu, tạo bản ghi mới
                            SavedResume::create([
                                'resume_id' => $record->id,
                                'company_id' => $companyId,
                            ]);

                            Notification::make()
                                ->title('Hồ sơ đã được lưu!')
                                ->success()
                                ->send();
                        } else {
                            // Nếu đã lưu, thông báo
                            Notification::make()
                                ->title('Hồ sơ đã được lưu trước đó!')
                                ->warning()
                                ->send();
                        }
                    })
                    ->requiresConfirmation(),

            ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]) ->filters([

        ])
        ->searchable();
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
            'index' => Pages\ListResumes::route('/'),
            'create' => Pages\CreateResume::route('/create'),
            'edit' => Pages\EditResume::route('/{record}/edit'),
        ];
    }
}
