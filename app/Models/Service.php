<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    /**
     * Các thuộc tính có thể gán hàng loạt
     *
     * @var array
     */
    protected $fillable = [
        'package_name',
        'illustration_image', 
        'description',
        'price',
        'duration',
        'job_post_count',
        'highlight_post',
        'top_sector',
        'border_effect',
        'hot_effect',
        'highlight_logo',
        'homepage_banner'
    ];

    /**
     * Quan hệ với bảng purchased_services
     * Một dịch vụ có thể thuộc nhiều đơn hàng
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchasedServices()
    {
        return $this->hasMany(PurchasedService::class, 'service_id');
    }
}
