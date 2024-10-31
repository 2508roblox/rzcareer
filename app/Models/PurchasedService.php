<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasedService extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'service_id',
        'invoice_id',
        'status',
        'quantity',
        'used_quantity',
        'purchase_date',
        'expiration_date'
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

    // Quan hệ với bảng Invoice
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
