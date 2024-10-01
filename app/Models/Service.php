<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
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

    // Nếu có quan hệ với các model khác, bạn có thể thêm các phương thức dưới đây
    // Ví dụ: Một dịch vụ có thể thuộc nhiều đơn hàng purchased_services
    public function purchasedServices()
    {
        return $this->hasMany(PurchasedService::class, 'service_id');
    }
}
