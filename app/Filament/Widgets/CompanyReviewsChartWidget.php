<?php

namespace App\Filament\Widgets;

use App\Models\CompanyReview;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class CompanyReviewsChartWidget extends ChartWidget
{
    protected static ?int $sort = 5; // Đặt thứ tự sắp xếp cho widget
    protected static ?string $heading = 'Đánh giá công ty theo thời gian';

    // Định dạng biểu đồ
    protected function getType(): string
    {
        return 'line'; // Biểu đồ dạng đường
    }

    // Hàm lấy dữ liệu cho biểu đồ  
    protected function getData(): array
    {
        $currentYear = Carbon::now()->year;

        // Khởi tạo mảng để lưu dữ liệu cho 12 tháng
        $months = [];
        $salaryBenefit = [];
        $trainingOpportunity = [];
        $employeeCare = [];
        $companyCulture = [];
        $workplaceEnvironment = [];

        // Lặp qua 12 tháng gần nhất
        for ($i = 0; $i < 12; $i++) {
            $month = Carbon::now()->subMonths($i);
            $months[] = $month->format('m/Y');

            // Lấy đánh giá cho từng tiêu chí trong tháng này
            $reviews = CompanyReview::whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->get();

            // Tính điểm trung bình cho từng tiêu chí
            $salaryBenefit[] = $reviews->avg('salary_benefit') ?? 0;
            $trainingOpportunity[] = $reviews->avg('training_opportunity') ?? 0;
            $employeeCare[] = $reviews->avg('employee_care') ?? 0;
            $companyCulture[] = $reviews->avg('company_culture') ?? 0;
            $workplaceEnvironment[] = $reviews->avg('workplace_environment') ?? 0;
        }

        // Đảo ngược dữ liệu để hiển thị từ tháng mới nhất
        return [
            'labels' => array_reverse($months), // Tháng
            'datasets' => [
                [
                    'label' => 'Lương & phúc lợi',
                    'data' => array_reverse($salaryBenefit),
                    'borderColor' => '#FF6384',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'fill' => true,
                ],
                [
                    'label' => 'Cơ hội đào tạo',
                    'data' => array_reverse($trainingOpportunity),
                    'borderColor' => '#36A2EB',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'fill' => true,
                ],
                [
                    'label' => 'Chăm sóc nhân viên',
                    'data' => array_reverse($employeeCare),
                    'borderColor' => '#FFCE56',
                    'backgroundColor' => 'rgba(255, 206, 86, 0.2)',
                    'fill' => true,
                ],
                [
                    'label' => 'Văn hóa công ty',
                    'data' => array_reverse($companyCulture),
                    'borderColor' => '#4BC0C0',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'fill' => true,
                ],
                [
                    'label' => 'Môi trường làm việc',
                    'data' => array_reverse($workplaceEnvironment),
                    'borderColor' => '#9966FF',
                    'backgroundColor' => 'rgba(153, 102, 255, 0.2)',
                    'fill' => true,
                ],
            ],
        ];
    }

    // Đặt số cột mà widget sẽ chiếm
 
}