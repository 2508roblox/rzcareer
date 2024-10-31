<?php

namespace App\Filament\RecruiterPanel\Widgets;

use App\Filament\RecruiterPanel\Resources\SavedResumeResource;
use App\Models\SavedProfile; // Đảm bảo mô hình SavedProfile đã được tạo
use App\Models\SavedResume;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Facades\Storage;

class RecentSavedProfilesWidget extends BaseWidget
{
    protected static ?string $heading = 'Hồ Sơ Đã Lưu Mới Nhất'; // Tiêu đề widget
    protected int | string | array $columnSpan = 'full'; // Chiếm toàn bộ chiều rộng

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->query(SavedResumeResource::getEloquentQuery()) // Đảm bảo phương thức này trả về truy vấn đúng
            ->defaultPaginationPageOption(5) // Đặt trang mặc định cho phân trang
            ->defaultSort('created_at', 'desc') // Sắp xếp theo ngày tạo giảm dần
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
}