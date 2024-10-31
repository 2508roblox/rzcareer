<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPostService extends Model
{
    use HasFactory;

    protected $fillable = ['purchased_service_id', 'list_jobs', 'start_date', 'end_date'];
    protected $casts = [
        'list_jobs' => 'json', // Đảm bảo list_jobs được cast thành mảng
    ];
    public function job()
    {
        return $this->belongsTo(JobPost::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Get the purchased service associated with the JobPostService.
     */
    public function purchasedService()
    {
        return $this->belongsTo(PurchasedService::class);
    }
}
