<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = ['invoice_code', 'user_id', 'total_price', 'status', 'purchase_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function purchasedServices()
    {
        return $this->hasMany(PurchasedService::class, 'invoice_id');
    }

    public function paymentHistory()
    {
        return $this->hasMany(PaymentHistory::class, 'invoice_id');
    }
    public function markAsPaid()
    {
        $this->status = 'successful'; // Giả sử bạn có thuộc tính 'status'
        $this->save(); // Lưu thay đổi vào cơ sở dữ liệu
    }
}
