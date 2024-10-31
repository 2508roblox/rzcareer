<?php

namespace App\Filament\RecruiterPanel\Widgets;

use App\Models\JobPost;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;

class JobPostChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Biểu đồ bài tuyển dụng theo tháng';

    protected function getData(): array
    {
        // Mảng tên tháng tiếng Việt
        $months = [
            'Tháng 1',
            'Tháng 2',
            'Tháng 3',
            'Tháng 4',
            'Tháng 5',
            'Tháng 6',
            'Tháng 7',
            'Tháng 8',
            'Tháng 9',
            'Tháng 10',
            'Tháng 11',
            'Tháng 12',
        ];
        
        $jobPostCounts = [];
        $currentYear = Carbon::now()->year;
    
        // Lặp qua 12 tháng gần nhất, bắt đầu từ tháng hiện tại
        for ($i = 0; $i < 12; $i++) {
            $date = Carbon::now()->subMonths($i);
            $monthIndex = ($date->month - 1 + 12) % 12; // Tính chỉ số tháng
            $jobPostCounts[] = JobPost::where('company_id', Auth::user()->company->id) // Lọc theo company_id
                ->whereYear('created_at', $date->year) // Lọc theo năm
                ->whereMonth('created_at', $date->month) // Lọc theo tháng
                ->count();
        }
    
        return [
            'datasets' => [
                [
                    'label' => 'Số lượng bài tuyển dụng',
                    'data' => $jobPostCounts,
                    'backgroundColor' => '#4F46E5', // Màu nền cho biểu đồ
                ],
            ],
            'labels' => array_reverse(array_map(function ($index) use ($months) {
                return $months[$index];
            }, array_reverse(range(0, 11)))), // Đảo ngược để hiển thị từ tháng mới nhất
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // Loại biểu đồ là biểu đồ cột (bar chart)
    }
}