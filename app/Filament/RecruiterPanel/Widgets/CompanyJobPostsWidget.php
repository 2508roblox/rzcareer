<?php

namespace App\Filament\RecruiterPanel\Widgets;

use App\Models\JobPost;
use App\Models\PostActivity;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class CompanyJobPostsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        // Lấy người dùng hiện tại
        $user = Auth::user();

        // Lấy danh sách các công ty của người dùng hiện tại
        $companyIds = $user->company()->pluck('id');

        // Đếm số lượng bài đăng công việc thuộc về các công ty này
        $jobPostCount = JobPost::whereIn('company_id', $companyIds)->count();

        // Đếm số lượng ứng tuyển liên quan đến các bài đăng công việc này
        $postActivityCount = PostActivity::whereHas('jobPost', function ($query) use ($companyIds) {
            $query->whereIn('company_id', $companyIds);
        })->count();

        return [
            Stat::make('Số bài đăng công việc', $jobPostCount)
                ->description('Bài đăng của các công ty thuộc về bạn')
                ->icon('heroicon-o-briefcase')
                ->color('success'),

            Stat::make('Số lượng ứng tuyển', $postActivityCount)
                ->description('Số lượng ứng viên đã ứng tuyển vào các bài đăng')
                ->icon('heroicon-o-user-group')
                ->color('primary'),
        ];
    }
}
