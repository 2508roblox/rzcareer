<?php

namespace App\Filament\RecruiterPanel\Widgets;

use App\Models\PostActivity;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class PostActivityChart extends ChartWidget
{
    protected static ?string $heading = 'Biểu đồ ứng tuyển theo tháng';

    protected function getData(): array
    {
        // Lấy số lượng ứng tuyển theo từng tháng trong năm hiện tại
        $postActivities = PostActivity::query()
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Chuẩn bị dữ liệu cho biểu đồ
        $months = [
            '1' => 'Tháng 1',
            '2' => 'Tháng 2',
            '3' => 'Tháng 3',
            '4' => 'Tháng 4',
            '5' => 'Tháng 5',
            '6' => 'Tháng 6',
            '7' => 'Tháng 7',
            '8' => 'Tháng 8',
            '9' => 'Tháng 9',
            '10' => 'Tháng 10',
            '11' => 'Tháng 11',
            '12' => 'Tháng 12',
        ];

        // Dữ liệu ứng tuyển theo tháng
        $data = array_fill(1, 12, 0);
        foreach ($postActivities as $activity) {
            $data[$activity->month] = $activity->count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Số lượng ứng tuyển',
                    'data' => array_values($data),
                    'backgroundColor' => '#34d399',
                ],
            ],
            'labels' => array_values($months),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
