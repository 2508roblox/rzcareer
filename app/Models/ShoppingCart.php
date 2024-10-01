<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'service_id',
        'quantity',
        'total_price'
    ];

    // Quan hệ với bảng User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Quan hệ với bảng Service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
