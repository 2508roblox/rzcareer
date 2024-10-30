<?php

namespace App\Filament\Widgets;

use App\Models\Company;
use App\Models\User;
use App\Models\JobPost;
use App\Models\PurchasedService;
use App\Models\SeekerProfile;
use App\Models\Interview;
use App\Models\CompanyReview;
 
use App\Models\Invoice;
use App\Models\SavedResume;
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

        // 1. Số lượng Công ty
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

        // 4. Số lượng ứng viên (SeekerProfiles)
        $seekersThisMonth = SeekerProfile::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->count();
        $seekersLastMonth = SeekerProfile::whereMonth('created_at', $previousMonth)
            ->whereYear('created_at', $previousYear)
            ->count();
        $seekerChangePercentage = $this->calculatePercentageChange($seekersThisMonth, $seekersLastMonth);

        // 5. Số lượng dịch vụ đã mua
        $purchasedServicesThisMonth = PurchasedService::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->count();
        $purchasedServicesLastMonth = PurchasedService::whereMonth('created_at', $previousMonth)
            ->whereYear('created_at', $previousYear)
            ->count();
        $purchasedServicesChangePercentage = $this->calculatePercentageChange($purchasedServicesThisMonth, $purchasedServicesLastMonth);

        // 6. Doanh thu tháng này
        $revenueThisMonth = Invoice::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('total_price');
        $revenueLastMonth = Invoice::whereMonth('created_at', $previousMonth)
            ->whereYear('created_at', $previousYear)
            ->sum('total_price');
        $revenueChangePercentage = $this->calculatePercentageChange($revenueThisMonth, $revenueLastMonth);

        // 7. Tỉ lệ phỏng vấn thành công
        $interviewsThisMonth = Interview::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->count();
        $completedInterviewsThisMonth = Interview::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->where('status', 'completed')
            ->count();
        $interviewSuccessRate = $interviewsThisMonth > 0 ? round(($completedInterviewsThisMonth / $interviewsThisMonth) * 100, 2) : 0;

        // 8. Số lượng đánh giá của ứng viên
        $reviewsThisMonth = CompanyReview::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->count();

        // 9. Lượt tìm kiếm ứng viên
        $searchLogsThisMonth = SavedResume::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->count();

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

            Card::make("Số lượng Ứng viên - Tăng/Giảm: $seekerChangePercentage% so với tháng trước", $seekersThisMonth)
                ->description("Thay đổi: $seekerChangePercentage%")
                ->descriptionIcon($seekerChangePercentage >= 0 ? 'heroicon-o-arrow-up' : 'heroicon-o-arrow-down')
                ->color($seekerChangePercentage >= 0 ? 'success' : 'danger'),

            Card::make("Số lượng Dịch vụ đã Bán - Tăng/Giảm: $purchasedServicesChangePercentage% so với tháng trước", $purchasedServicesThisMonth)
                ->description("Thay đổi: $purchasedServicesChangePercentage%")
                ->descriptionIcon($purchasedServicesChangePercentage >= 0 ? 'heroicon-o-arrow-up' : 'heroicon-o-arrow-down')
                ->color($purchasedServicesChangePercentage >= 0 ? 'success' : 'danger'),

            Card::make("Doanh thu tháng này - Tăng/Giảm: $revenueChangePercentage% so với tháng trước", number_format($revenueThisMonth, 0, ',', '.') . ' VNĐ')
                ->description("Thay đổi: $revenueChangePercentage%")
                ->descriptionIcon($revenueChangePercentage >= 0 ? 'heroicon-o-arrow-up' : 'heroicon-o-arrow-down')
                ->color($revenueChangePercentage >= 0 ? 'success' : 'danger'),

            Card::make("Tỉ lệ phỏng vấn thành công", "$interviewSuccessRate%")
                ->description("Tỉ lệ các lịch phỏng vấn thành công trên tổng số lịch phỏng vấn")
                ->color($interviewSuccessRate >= 50 ? 'success' : 'danger'),

            Card::make("Số lượng đánh giá của ứng viên", $reviewsThisMonth)
                ->description("Đánh giá  công ty tháng này")
                ->color('primary'),

            Card::make("Lượt tìm kiếm ứng viên", $searchLogsThisMonth)
                ->description("Tìm kiếm ứng viên tháng này")
                ->color('primary'),
        ];
    }

    private function calculatePercentageChange($current, $previous): float
    {
        if ($previous == 0) {
            return $current > 0 ? 100 : 0;
        }

        return round((($current - $previous) / $previous) * 100, 2);
    }
}