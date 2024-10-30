<?php

namespace App\Filament\RecruiterPanel\Widgets;

use App\Filament\RecruiterPanel\Resources\JobPostResource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestPostsWidget extends BaseWidget
{
    protected static ?string $heading = 'Bài Tuyển Dụng Mới Nhất'; // Đặt tiêu đề cho widget
    protected int | string | array $columnSpan = 'full'; // Đặt cột chiếm toàn bộ chiều rộng
    protected static ?int $sort = 20; // Đặt thứ tự sắp xếp cho widget

    public function table(Table $table): Table
    {
        return $table
            ->query(JobPostResource::getEloquentQuery()) // Đảm bảo phương thức này trả về truy vấn đúng
            ->defaultPaginationPageOption(5) // Đặt trang mặc định cho phân trang
            ->defaultSort('created_at', 'desc') // Sắp xếp theo ngày tạo giảm dần
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->numeric()
                    ->sortable()
                    ->label('ID'),
                Tables\Columns\TextColumn::make('career_id')
                    ->numeric()
                    ->sortable()
                    ->label('Mã Nghề'),

                Tables\Columns\TextColumn::make('company_id')
                    ->numeric()
                    ->sortable()
                    ->label('Mã Công Ty'),

                Tables\Columns\TextColumn::make('location_id')
                    ->numeric()
                    ->sortable()
                    ->label('Mã Địa Điểm'),

                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable()
                    ->label('Mã Người Dùng'),

                Tables\Columns\TextColumn::make('job_name')
                    ->searchable()
                    ->label('Tên Công Việc'),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->label('Slug'),

                Tables\Columns\TextColumn::make('deadline')
                    ->date()
                    ->sortable()
                    ->label('Hạn Chót')
                    ->formatStateUsing(fn($state) => \Carbon\Carbon::parse($state)->format('d/m/Y')),

                Tables\Columns\TextColumn::make('quantity')
                    ->numeric()
                    ->sortable()
                    ->label('Số Lượng'),

                Tables\Columns\TextColumn::make('gender_required')
                    ->searchable()
                    ->label('Giới Tính Cần Thiết')
                    ->formatStateUsing(fn($state) => match ($state) {
                        0 => 'Không',
                        1 => 'Nam',
                        2 => 'Nữ',
                        default => 'Không xác định',
                    }),

                Tables\Columns\TextColumn::make('position')
                    ->searchable()
                    ->label('Chức Vụ'),

                Tables\Columns\TextColumn::make('type_of_workplace')
                    ->searchable()
                    ->label('Loại Nơi Làm Việc'),

                Tables\Columns\TextColumn::make('experience')
                    ->searchable()
                    ->label('Kinh Nghiệm'),

                Tables\Columns\TextColumn::make('academic_level')
                    ->searchable()
                    ->label('Trình Độ Học Vấn'),

                Tables\Columns\TextColumn::make('job_type')
                    ->searchable()
                    ->label('Loại Công Việc'),

                Tables\Columns\TextColumn::make('salary_min')
                    ->numeric()
                    ->sortable()
                    ->label('Mức Lương Tối Thiểu'),

                Tables\Columns\TextColumn::make('salary_max')
                    ->numeric()
                    ->sortable()
                    ->label('Mức Lương Tối Đa'),

                Tables\Columns\TextColumn::make('salary_type')
                    ->label('Loại Lương'),

                Tables\Columns\TextColumn::make('is_hot')
                    ->numeric()
                    ->sortable()
                    ->label('Nổi Bật')
                    ->formatStateUsing(fn($state) => $state ? 'Có' : 'Không'),

                Tables\Columns\TextColumn::make('is_urgent')
                    ->numeric()
                    ->sortable()
                    ->label('Khẩn Cấp')
                    ->formatStateUsing(fn($state) => $state ? 'Có' : 'Không'),

                Tables\Columns\TextColumn::make('contact_person_name')
                    ->searchable()
                    ->label('Tên Người Liên Hệ'),

                Tables\Columns\TextColumn::make('contact_person_phone')
                    ->searchable()
                    ->label('Số Điện Thoại Người Liên Hệ'),

                Tables\Columns\TextColumn::make('contact_person_email')
                    ->searchable()
                    ->label('Email Người Liên Hệ'),

                Tables\Columns\TextColumn::make('views')
                    ->numeric()
                    ->sortable()
                    ->label('Lượt Xem'),

                Tables\Columns\TextColumn::make('shares')
                    ->numeric()
                    ->sortable()
                    ->label('Lượt Chia Sẻ'),

                Tables\Columns\TextColumn::make('status')
                    ->numeric()
                    ->sortable()
                    ->label('Trạng Thái'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Ngày Tạo')
                    ->formatStateUsing(fn($state) => \Carbon\Carbon::parse($state)->format('d/m/Y H:i')),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Ngày Cập Nhật')
                    ->formatStateUsing(fn($state) => \Carbon\Carbon::parse($state)->format('d/m/Y H:i')),
      
            ])
            ->headerActions([
                // Thêm các hành động nếu cần
            ])
            ->actions([])
            ->filters([
                // Thêm bộ lọc nếu cần
            ]);
    }
}
