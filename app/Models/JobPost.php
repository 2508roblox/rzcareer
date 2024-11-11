<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class JobPost extends Model
{
    use HasFactory;
    protected $fillable = [
        'career_id', 'company_id', 'location_id', 'user_id', 'job_name', 'slug', 'deadline', 'quantity', 'gender_required', 'job_description', 'job_requirement', 'benefits_enjoyed', 'position', 'type_of_workplace', 'experience', 'academic_level', 'job_type', 'salary_min', 'salary_max', 'salary_type', 'is_hot', 'is_urgent', 'contact_person_name', 'contact_person_phone', 'contact_person_email', 'views', 'shares', 'status'
    ];

    public function career()
    {
        return $this->belongsTo(CommonCareer::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function location()
    {
        return $this->belongsTo(CommonLocation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function city()
    {
        return $this->belongsTo(CommonCity::class, 'location_id');
    }
    public function postActivities()
    {
        return $this->hasMany(PostActivity::class);
    }
    public function getActiveServicesByProductId($productId)
    {
        // Lấy các JobPostService chứa productId trong list_jobs
        $jobPostServices = JobPostService::whereJsonContains('list_jobs', (string) $productId)->get();

        // Lấy danh sách IDs của các purchased_service_id từ JobPostService
        $purchasedServiceIds = $jobPostServices->pluck('purchased_service_id')->toArray();

        // Lấy các PurchasedService dựa vào danh sách purchased_service_id
        $purchasedServices = PurchasedService::whereIn('id', $purchasedServiceIds)->get();

        // Lấy danh sách service_id từ PurchasedService
        $serviceIds = $purchasedServices->pluck('service_id')->toArray();

        // Lấy các dịch vụ tương ứng từ bảng Service dựa vào service_id và đảm bảo không trùng lặp
        $services = Service::whereIn('id', $serviceIds)->distinct()->get();

        // Khởi tạo mảng kết quả
        $activeServices = [];

        // Lặp qua từng dịch vụ để tạo ra 6 biến
        foreach ($services as $service) {
            $activeServices[] = [
                'highlight_post' => $service->highlight_post ?? 0,
                'top_sector' => $service->top_sector ?? 0,
                'border_effect' => $service->border_effect ?? 0,
                'hot_effect' => $service->hot_effect ?? 0,
                'highlight_logo' => $service->highlight_logo ?? 0,
                'homepage_banner' => $service->homepage_banner ?? 0,
            ];
        }

        return $activeServices;
    }



    protected static function booted()
    {
        // Clear cache when a job post is created, updated, or deleted
        static::saved(function () {
            Cache::forget('hot_job_posts');
            Cache::forget('urgent_job_posts');
        });

        static::deleted(function () {
            Cache::forget('hot_job_posts');
            Cache::forget('urgent_job_posts');
        });
    }

}
