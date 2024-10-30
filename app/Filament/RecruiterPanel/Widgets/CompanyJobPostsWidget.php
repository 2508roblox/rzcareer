<?php

namespace App\Filament\RecruiterPanel\Widgets;

use App\Models\JobPost;
use App\Models\PostActivity;
use App\Models\CompanyReview;
use App\Models\SavedResume;
use App\Models\Application; // Model for applications
use App\Models\Interview; // Model for interviews
use App\Models\Invoice; // Model for invoices
use App\Models\PaymentHistory; // Model for payment history
use App\Models\PurchasedService; // Model for purchased services
use App\Models\Cart; // Model for cart items
use App\Models\Interviewer; // Model for interviewers
use App\Models\ShoppingCart;
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

        // Đếm số lượt đánh giá của các công ty thuộc về người dùng
        $reviewCount = CompanyReview::whereIn('company_id', $companyIds)->count();

        // Đếm số hồ sơ đã lưu
        $savedProfileCount = SavedResume::whereIn('company_id', $companyIds)->count();

        // Thêm các thống kê khác
        $applicationCount = PostActivity::whereIn('job_post_id', JobPost::whereIn('company_id', $companyIds)->pluck('id'))->count();

        $interviewCount = Interview::whereIn('job_post_id', JobPost::whereIn('company_id', $companyIds)->pluck('id'))->count();

        $invoiceCount = Invoice::where('user_id', $user->id)->count();
        $paymentHistoryCount = PaymentHistory::where('user_id', auth()->id())->count();
        $purchasedServiceCount = PurchasedService::where('user_id', auth()->id())->count();
        $totalInvoiceAmount = Invoice::where('user_id', auth()->id())->sum('total_price');

        return [
            Stat::make('Số bài đăng công việc', $jobPostCount)
                ->description('Bài đăng của các công ty thuộc về bạn')
                ->icon('heroicon-o-briefcase')
                ->color('success'),

            Stat::make('Số lượng ứng tuyển', $postActivityCount)
                ->description('Số lượng ứng viên đã ứng tuyển vào các bài đăng')
                ->icon('heroicon-o-user-group')
                ->color('primary'),

            Stat::make('Số lượt đánh giá', $reviewCount)
                ->description('Các đánh giá của công ty thuộc về bạn')
                ->icon('heroicon-o-star')
                ->color('warning'),

            Stat::make('Số hồ sơ đã lưu', $savedProfileCount)
                ->description('Số hồ sơ ứng viên đã lưu từ các bài đăng')
                ->icon('heroicon-o-bookmark')
                ->color('info'),

            Stat::make('Số lượng ứng tuyển', $applicationCount)
                ->description('Tổng số ứng tuyển vào các bài đăng của bạn')
                ->icon('heroicon-o-document')
                ->color('success'),

            Stat::make('Số buổi phỏng vấn', $interviewCount)
                ->description('Tổng số buổi phỏng vấn đã lên lịch')
                ->icon('heroicon-o-document')

                ->color('primary'),

            Stat::make('Số hóa đơn', $invoiceCount)
                ->description('Tổng số hóa đơn đã phát hành')
                ->icon('heroicon-o-document')

                ->color('warning'),

            Stat::make('Lịch sử thanh toán', $paymentHistoryCount)
                ->description('Tổng số giao dịch thanh toán')
                ->icon('heroicon-o-credit-card')
                ->color('info'),

            Stat::make('Dịch vụ đã mua', $purchasedServiceCount)
                ->description('Tổng số dịch vụ đã mua')
                ->icon('heroicon-o-credit-card')

                ->color('success'),
                Stat::make('Tổng tiền hóa đơn', number_format($totalInvoiceAmount, 0, ',', '.').' VNĐ') // Thêm tổng tiền hóa đơn
                ->description('Tổng số tiền của các hóa đơn đã tạo')
                ->icon('heroicon-o-credit-card')
                ->color('success'),
        ];
    }
}
