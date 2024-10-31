<?php

namespace App\Filament\Widgets;

use App\Models\Interview;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class InterviewStatusWidget extends ChartWidget
{
    protected static ?string $heading = 'Các cuộc phỏng vấn';
    protected static ?int $sort = 5;

    protected function getData(): array
    {
        $statusCounts = Interview::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->get();

        $data = [];
        $labels = [];
        foreach ($statusCounts as $status) {
            $data[] = $status->count;
            switch ($status->status) {
                case 'scheduled':
                    $labels[] = 'Đã Lên Lịch';
                    break;
                case 'completed':
                    $labels[] = 'Hoàn Thành';
                    break;
                case 'canceled':
                    $labels[] = 'Đã Hủy';
                    break;
            }
        }

        return [
            'datasets' => [
                [
                    'data' => $data,
                    'backgroundColor' => $this->getColors(),
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }

    protected function getColors(): array
    {
        return [
            '#4CAF50', // Xanh lá
            '#2196F3', // Xanh dương
            '#F44336', // Đỏ
        ];
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'title' => [
                    'display' => true,
                    'text' => 'Trạng thái Buổi Phỏng Vấn',
                ],
            ],
            'responsive' => true,
            'maintainAspectRatio' => false,
        ];
    }
}