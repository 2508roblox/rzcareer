<?php

namespace App\Filament\RecruiterPanel\Widgets;

use App\Filament\RecruiterPanel\Resources\InterviewResource;
use App\Models\Interview; // Đảm bảo mô hình Interview đã được tạo
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentInterviewsWidget extends BaseWidget
{
    protected static ?string $heading = 'Buổi Phỏng Vấn Mới Nhất'; // Tiêu đề widget
    protected int | string | array $columnSpan = 'full'; // Chiếm toàn bộ chiều rộng

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->query(InterviewResource::getEloquentQuery()) // Đảm bảo phương thức này trả về truy vấn đúng
            ->defaultPaginationPageOption(5) // Đặt trang mặc định cho phân trang
            ->defaultSort('created_at', 'desc') // Sắp xếp theo ngày tạo giảm dần
            ->columns([
                Tables\Columns\TextColumn::make('candidate.full_name') // Hiển thị tên ứng viên
                    ->label('Người Dự Tuyển') // Tiêu đề cột
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('slot.start_time') // Hiển thị thời gian phỏng vấn
                    ->label('Thời Gian Phỏng Vấn') // Tiêu đề cột
                    ->dateTime()
                    ->sortable(),

                Tables\Columns\TextColumn::make('jobPost.job_name') // Hiển thị tên công việc
                    ->label('Tên Công Việc') // Tiêu đề cột
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('slot.interviewer.full_name') // Hiển thị tên người phỏng vấn
                    ->label('Người Phỏng Vấn') // Tiêu đề cột
                    ->sortable()
                    ->searchable(),


                Tables\Columns\SelectColumn::make('status') // Hiển thị trạng thái phỏng vấn
                    ->label('Trạng Thái') // Tiêu đề cột
                    ->sortable()
                    ->options([
                        'scheduled' => 'Đã Lên Lịch',
                        'completed' => 'Hoàn Thành',
                        'canceled' => 'Đã Hủy',
                    ]),

                Tables\Columns\TextColumn::make('feedback') // Hiển thị phản hồi
                    ->label('Phản Hồi') // Tiêu đề cột
                    ->toggleable(), // Cho phép ẩn hiện cột
            ])
            ->filters([
                // Thêm các bộ lọc nếu cần
            ])
            ->actions([
                Tables\Actions\EditAction::make(), // Cho phép chỉnh sửa từng cuộc phỏng vấn
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(), // Cho phép xóa nhiều cuộc phỏng vấn
                ]),
            ]);
    }
}
