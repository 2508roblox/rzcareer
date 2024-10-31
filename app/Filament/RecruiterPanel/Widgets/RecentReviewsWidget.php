<?php

namespace App\Filament\RecruiterPanel\Widgets;

use App\Models\CompanyReview;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentReviewsWidget extends BaseWidget
{
    protected static ?string $heading = 'Đánh Giá Mới Nhất'; // Tiêu đề widget
    protected int | string | array $columnSpan = 'full'; // Chiếm toàn bộ chiều rộng
    protected static ?int $sort = 20; // Đặt thứ tự sắp xếp cho widget

    public function table(Table $table): Table
    {
        return $table
            ->query(CompanyReview::query()->orderBy('created_at', 'desc')->take(5)) // Lấy 5 đánh giá mới nhất
            ->columns([
                Tables\Columns\TextColumn::make('id') // Thêm ID đánh giá
                    ->label('ID Đánh giá')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('company.company_name')->label('Công ty'),
                Tables\Columns\TextColumn::make('user.full_name')->label('Người dùng'),
                Tables\Columns\TextColumn::make('content')->label('Nội dung đánh giá'),
                Tables\Columns\TextColumn::make('salary_benefit')->label('Lương thưởng & phúc lợi'),
                Tables\Columns\TextColumn::make('training_opportunity')->label('Đào tạo & học hỏi'),
                Tables\Columns\TextColumn::make('employee_care')->label('Sự quan tâm đến nhân viên'),
                Tables\Columns\TextColumn::make('company_culture')->label('Văn hoá công ty'),
                Tables\Columns\TextColumn::make('workplace_environment')->label('Văn phòng làm việc'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày Đánh giá')
                    ->dateTime(), // Đảm bảo kiểu dữ liệu chính xác
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
