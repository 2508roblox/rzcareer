<?php

namespace App\Filament\Widgets;

use App\Models\Company;
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CompanyStatsWidget extends ChartWidget
{
    protected static ?int $sort = 2;
    protected static ?string $heading = 'Số công ty theo tháng trong năm';

    // Định dạng biểu đồ
    protected function getType(): string
    {
        return 'line'; // Loại biểu đồ là 'line' (biểu đồ đường)
    }

    // Hàm lấy dữ liệu cho biểu đồ
    protected function getData(): array
    {
        // Lấy dữ liệu số lượng công ty theo từng tháng trong năm hiện tại
        $companiesPerMonth = Company::select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('count', 'month');

        // Khởi tạo mảng để lưu dữ liệu số lượng công ty cho 12 tháng
        $data = [];

        // Lặp qua từng tháng từ 1 đến 12
        for ($month = 1; $month <= 12; $month++) {
            // Lấy số lượng công ty cho từng tháng, nếu không có thì gán giá trị là 0
            $data[] = $companiesPerMonth->get($month, 0);
        }

        // Trả về dữ liệu cho biểu đồ
        return [
            'labels' => [
                'Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
                'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'
            ],
            'datasets' => [
                [
                    'label' => 'Số công ty được tạo',
                    'data' => $data,
                    'borderColor' => '#42A5F5', // Màu đường
                    'backgroundColor' => 'rgba(66, 165, 245, 0.2)', // Màu nền phía dưới đường
                    'fill' => true, // Đổ màu phía dưới đường
                ],
            ],
        ];
    }
}
