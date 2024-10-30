<?php

namespace App\Filament\Widgets;

use App\Models\JobPost;
use App\Models\Category;
use App\Models\CommonCareer;
use Filament\Widgets\ChartWidget;

class JobPostsByCategoryWidget extends ChartWidget
{
    protected static ?int $sort = 9; // Đặt thứ tự sắp xếp cho widget
    protected static ?string $heading = 'Số bài đăng công việc theo ngành nghề';
    protected static ?int $columns = 12; // Chiếm toàn bộ 12/12 cột (full-width)
    // Định dạng biểu đồ
    protected function getType(): string
    {
        return 'bar'; // Biểu đồ dạng cột
    }

    // Hàm lấy dữ liệu cho biểu đồ
    protected function getData(): array
    {
        // Lấy số bài đăng theo ngành nghề
        $jobPostsByCategory = JobPost::select('career_id', \DB::raw('COUNT(*) as count'))
            ->groupBy('career_id')
            ->pluck('count', 'career_id');

        // Lấy tên ngành nghề từ bảng Category
        $categories = CommonCareer::whereIn('id', $jobPostsByCategory->keys())->pluck('name', 'id');

        // Trả về dữ liệu cho biểu đồ
        return [
            'labels' => $categories->values()->toArray(), // Tên ngành nghề
            'datasets' => [
                [
                    'label' => 'Số bài đăng theo ngành nghề',
                    'data' => $categories->keys()->map(fn($id) => $jobPostsByCategory->get($id, 0))->toArray(),
                    'backgroundColor' => 'rgba(54, 162, 235, 0.5)', // Màu cho cột
                ],
            ],
        ];
    }
   
}