<?php

namespace App\Filament\Widgets;

use App\Models\Company;
use App\Models\User;
use App\Models\JobPost;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Carbon\Carbon;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;
    protected function getCards(): array
    {
        // Thời gian hiện tại (tháng này) và tháng trước
        $currentMonth = Carbon::now()->month;
        $previousMonth = Carbon::now()->subMonth()->month;
        $currentYear = Carbon::now()->year;
        $previousYear = Carbon::now()->subMonth()->year;

        // 1. Số lượng Company
        $companiesThisMonth = Company::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->count();
        $companiesLastMonth = Company::whereMonth('created_at', $previousMonth)
            ->whereYear('created_at', $previousYear)
            ->count();
        $companyChangePercentage = $this->calculatePercentageChange($companiesThisMonth, $companiesLastMonth);

        // 2. Số lượng User
        $usersThisMonth = User::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->count();
        $usersLastMonth = User::whereMonth('created_at', $previousMonth)
            ->whereYear('created_at', $previousYear)
            ->count();
        $userChangePercentage = $this->calculatePercentageChange($usersThisMonth, $usersLastMonth);

        // 3. Số lượng Job Posts
        $jobPostsThisMonth = JobPost::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->count();
        $jobPostsLastMonth = JobPost::whereMonth('created_at', $previousMonth)
            ->whereYear('created_at', $previousYear)
            ->count();
        $jobPostChangePercentage = $this->calculatePercentageChange($jobPostsThisMonth, $jobPostsLastMonth);

        return [
            Card::make("Số lượng Công ty - Tăng/Giảm: $companyChangePercentage% so với tháng trước", $companiesThisMonth)
                ->description("Thay đổi: $companyChangePercentage%")
                ->descriptionIcon($companyChangePercentage >= 0 ? 'heroicon-o-arrow-up' : 'heroicon-o-arrow-down')
                ->color($companyChangePercentage >= 0 ? 'success' : 'danger'),
        
            Card::make("Số lượng Người dùng - Tăng/Giảm: $userChangePercentage% so với tháng trước", $usersThisMonth)
                ->description("Thay đổi: $userChangePercentage%")
                ->descriptionIcon($userChangePercentage >= 0 ? 'heroicon-o-arrow-up' : 'heroicon-o-arrow-down')
                ->color($userChangePercentage >= 0 ? 'success' : 'danger'),
        
            Card::make("Số lượng Bài đăng - Tăng/Giảm: $jobPostChangePercentage% so với tháng trước", $jobPostsThisMonth)
                ->description("Thay đổi: $jobPostChangePercentage%")
                ->descriptionIcon($jobPostChangePercentage >= 0 ? 'heroicon-o-arrow-up' : 'heroicon-o-arrow-down')
                ->color($jobPostChangePercentage >= 0 ? 'success' : 'danger'),
        ];
        
        
    }

    // Hàm tính phần trăm thay đổi
    private function calculatePercentageChange($current, $previous): float
    {
        if ($previous == 0) {
            return $current > 0 ? 100 : 0;
        }

        return round((($current - $previous) / $previous) * 100, 2);
    }
}
