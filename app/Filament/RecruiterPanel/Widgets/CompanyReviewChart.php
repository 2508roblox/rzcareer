<?php

namespace App\Filament\RecruiterPanel\Widgets;

use App\Models\CompanyReview;
use Filament\Widgets\ChartWidget;

class CompanyReviewChart extends ChartWidget
{
    protected static ?string $heading = 'Biểu đồ đánh giá trung bình'; // Đặt tiêu đề cho widget

    protected function getData(): array
    {
        // Tính trung bình cho các trường cần thiết
        $averageData = CompanyReview::query()
            ->selectRaw('
                AVG(salary_benefit) as avg_salary_benefit,
                AVG(employee_care) as avg_employee_care,
                AVG(company_culture) as avg_company_culture,
                AVG(workplace_environment) as avg_workplace_environment
            ')
            ->first();

        return [
            'datasets' => [
                [
                    'label' => 'Trung bình',
                    'data' => [
                        $averageData->avg_salary_benefit,
                        $averageData->avg_employee_care,
                        $averageData->avg_company_culture,
                        $averageData->avg_workplace_environment,
                    ],
                    'backgroundColor' => ['#f87171', '#34d399', '#60a5fa', '#fbbf24'],
                ],
            ],
            'labels' => ['Lương thưởng', 'Chăm sóc nhân viên', 'Văn hóa công ty', 'Môi trường làm việc'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
