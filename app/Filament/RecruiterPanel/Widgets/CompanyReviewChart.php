<?php

namespace App\Filament\RecruiterPanel\Widgets;

use App\Models\CompanyReview;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class CompanyReviewChart extends ChartWidget
{
    protected static ?string $heading = 'Biểu đồ số lượt đánh giá và điểm trung bình theo tháng'; // Đặt tiêu đề cho widget

    protected function getData(): array
    {
        // Tính số lượt đánh giá và điểm trung bình theo tháng cho năm hiện tại
        $currentYear = Carbon::now()->year;
        $reviewCounts = [];
        $averageScores = [
            'salary_benefit' => [],
            'training_opportunity' => [],
            'employee_care' => [],
            'company_culture' => [],
            'workplace_environment' => [],
        ];

        for ($i = 1; $i <= 12; $i++) {
            // Tính số lượt đánh giá
            $reviewCounts[] = CompanyReview::whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $i)
                ->count();

            // Tính điểm trung bình cho từng trường
            foreach ($averageScores as $key => &$scores) {
                $avgScore = CompanyReview::whereYear('created_at', $currentYear)
                    ->whereMonth('created_at', $i)
                    ->avg($key); // Tính điểm trung bình cho mỗi trường
                $scores[] = $avgScore ?: 0; // Nếu không có đánh giá, gán giá trị 0
            }
        }

        return [
            'datasets' => [
                [
                    'label' => 'Số lượt đánh giá',
                    'data' => $reviewCounts, // Dữ liệu số lượt đánh giá theo tháng
                    'backgroundColor' => '#4F46E5', // Màu nền cho biểu đồ lượt đánh giá
                ],
                [
                    'label' => 'Điểm trung bình Lương & Phúc lợi',
                    'data' => $averageScores['salary_benefit'], // Dữ liệu điểm trung bình lương & phúc lợi
                    'backgroundColor' => '#34d399', // Màu nền cho biểu đồ điểm trung bình lương
                ],
                [
                    'label' => 'Điểm trung bình Cơ hội đào tạo',
                    'data' => $averageScores['training_opportunity'], // Dữ liệu điểm trung bình cơ hội đào tạo
                    'backgroundColor' => '#60a5fa', // Màu nền cho biểu đồ điểm trung bình cơ hội đào tạo
                ],
                [
                    'label' => 'Điểm trung bình Chăm sóc nhân viên',
                    'data' => $averageScores['employee_care'], // Dữ liệu điểm trung bình chăm sóc nhân viên
                    'backgroundColor' => '#fbbf24', // Màu nền cho biểu đồ điểm trung bình chăm sóc nhân viên
                ],
                [
                    'label' => 'Điểm trung bình Văn hóa công ty',
                    'data' => $averageScores['company_culture'], // Dữ liệu điểm trung bình văn hóa công ty
                    'backgroundColor' => '#f87171', // Màu nền cho biểu đồ điểm trung bình văn hóa công ty
                ],
                [
                    'label' => 'Điểm trung bình Môi trường làm việc',
                    'data' => $averageScores['workplace_environment'], // Dữ liệu điểm trung bình môi trường làm việc
                    'backgroundColor' => '#fbbf24', // Màu nền cho biểu đồ điểm trung bình môi trường làm việc
                ],
            ],
            'labels' => [
                'Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 
                'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 
                'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'
            ], // Nhãn tháng từ 1 đến 12
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // Loại biểu đồ là biểu đồ cột
    }
}