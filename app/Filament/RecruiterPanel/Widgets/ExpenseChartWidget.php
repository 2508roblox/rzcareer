<?php

namespace App\Filament\RecruiterPanel\Widgets;

use App\Models\Invoice; // Import mô hình Invoice
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;

class ExpenseChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Biểu đồ chi tiêu theo tháng';

    protected function getData(): array
    {
        // Mảng tháng từ 1 đến 12
        $months = [
            'Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4',
            'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8',
            'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12',
        ];

        $expenses = array_fill(0, 12, 0); // Khởi tạo mảng chi tiêu với 12 phần tử bằng 0

        // Lấy năm hiện tại
        $currentYear = Carbon::now()->year;

        // Lặp qua 12 tháng của năm hiện tại
        for ($i = 0; $i < 12; $i++) {
            $month = $i + 1; // Chỉ số tháng từ 1 đến 12
            $expenses[$i] = Invoice::where('user_id', Auth::user()->id) // Lọc theo user_id
                ->whereYear('created_at', $currentYear) // Lọc theo năm hiện tại
                ->whereMonth('created_at', $month) // Lọc theo tháng
                ->sum('total_price'); // Tổng số tiền của hóa đơn
        }

        return [
            'datasets' => [
                [
                    'label' => 'Tổng chi tiêu',
                    'data' => $expenses, // Dữ liệu chi tiêu cho 12 tháng
                    'backgroundColor' => '#F59E0B', // Màu nền cho biểu đồ chi tiêu
                ],
            ],
            'labels' => $months, // Nhãn tháng từ 1 đến 12
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // Loại biểu đồ là biểu đồ cột
    }
}