<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\JobPost;
use App\Models\Company;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class CombinedStatsWidget extends ChartWidget
{
    protected static ?int $sort = 3;
    protected static ?string $heading = 'Thống kê người dùng, bài đăng công việc và công ty theo 12 tháng gần nhất';

    // Định dạng biểu đồ
    protected function getType(): string
    {
        return 'line'; // Biểu đồ dạng đường
    }

    // Hàm lấy dữ liệu cho biểu đồ
    protected function getData(): array
    {
        // Lấy dữ liệu số lượng người dùng mới, bài đăng công việc và công ty theo 12 tháng gần nhất
        $months = [];
        $userData = [];
        $jobPostData = [];
        $companyData = [];

        // Lấy tháng hiện tại
        $currentDate = Carbon::now();

        // Lặp qua 12 tháng gần nhất
        for ($i = 0; $i < 12; $i++) {
            $month = $currentDate->copy()->subMonths($i); // Tính tháng gần nhất
            $months[] = $month->format('m/Y'); // Định dạng tháng

            // Lấy số lượng người dùng mới cho từng tháng
            $monthlyUsers = User::whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->count();

            // Lấy số lượng bài đăng công việc cho từng tháng
            $monthlyJobPosts = JobPost::whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->count();

            // Lấy số lượng công ty cho từng tháng
            $monthlyCompanies = Company::whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->count();

            // Lưu dữ liệu vào mảng
            $userData[] = $monthlyUsers;
            $jobPostData[] = $monthlyJobPosts;
            $companyData[] = $monthlyCompanies;
        }

        // Đảo ngược dữ liệu để hiển thị từ tháng mới nhất
        return [
            'labels' => array_reverse($months), // Tháng
            'datasets' => [
                [
                    'label' => 'Số người dùng mới',
                    'data' => array_reverse($userData),
                    'borderColor' => '#FFD700', // Màu vàng cho đường
                    'backgroundColor' => 'rgba(255, 215, 0, 0.2)', // Màu vàng nhạt cho nền dưới đường
                    'fill' => true, // Đổ màu phía dưới đường
                ],
                [
                    'label' => 'Số bài đăng công việc',
                    'data' => array_reverse($jobPostData),
                    'borderColor' => '#FF6384', // Màu đường cho bài đăng
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)', // Màu nền phía dưới đường
                    'fill' => true, // Đổ màu phía dưới đường
                ],
                [
                    'label' => 'Số công ty được tạo',
                    'data' => array_reverse($companyData),
                    'borderColor' => '#42A5F5', // Màu đường cho công ty
                    'backgroundColor' => 'rgba(66, 165, 245, 0.2)', // Màu nền phía dưới đường
                    'fill' => true, // Đổ màu phía dưới đường
                ],
            ],
        ];
    }
}