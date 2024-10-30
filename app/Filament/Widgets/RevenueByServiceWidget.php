<?php

namespace App\Filament\Widgets;

use App\Models\Invoice;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class RevenueByServiceWidget extends ChartWidget
{
    protected static ?int $sort = 7;
    protected static ?string $heading = 'Tổng doanh thu và tổng đơn hàng theo 12 tháng';

    // Định dạng biểu đồ
    protected function getType(): string
    {
        return 'line'; // Đổi thành 'line' để hiển thị biểu đồ đường
    }

    // Hàm lấy dữ liệu cho biểu đồ
    protected function getData(): array
    {
        // Lấy tháng hiện tại
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Khởi tạo mảng để lưu dữ liệu cho 12 tháng
        $months = [];
        $revenueData = [];
        $orderCountData = [];

        // Lặp qua 12 tháng
        for ($i = 0; $i < 12; $i++) {
            $month = ($currentMonth - $i + 12) % 12 ?: 12; // Tính tháng
            $year = $currentYear - floor(($currentMonth - $i - 1) / 12); // Tính năm

            // Lưu tháng vào mảng
            $months[] = "$month/$year";

            // Lấy tổng doanh thu và tổng đơn hàng cho tháng này
            $monthlyRevenue = Invoice::whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
                ->sum('total_price');

            $monthlyOrderCount = Invoice::whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
                ->count();

            // Lưu dữ liệu vào mảng
            $revenueData[] = $monthlyRevenue;
            $orderCountData[] = $monthlyOrderCount;
        }

        // Trả về dữ liệu cho biểu đồ
        return [
            'labels' => array_reverse($months), // Đảo ngược để hiển thị từ tháng mới nhất
            'datasets' => [
                [
                    'label' => 'Tổng doanh thu',
                    'data' => array_reverse($revenueData),
                    'borderColor' => 'rgba(66, 165, 245, 1)', // Màu đường cho doanh thu
                    'backgroundColor' => 'rgba(66, 165, 245, 0.2)', // Màu nền cho doanh thu
                    'fill' => true, // Đổ màu phía dưới đường
                ],
                [
                    'label' => 'Tổng đơn hàng',
                    'data' => array_reverse($orderCountData),
                    'borderColor' => 'rgba(255, 99, 132, 1)', // Màu đường cho đơn hàng
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)', // Màu nền cho đơn hàng
                    'fill' => true, // Đổ màu phía dưới đường
                ],
            ],
        ];
    }
}