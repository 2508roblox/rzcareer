<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeekerProfile extends Model
{
    use HasFactory;

    // Thêm các trường có thể gán
    protected $fillable = [
        'user_id',
        'location_id',
        'phone',
        'birthday',
        'gender',
        'marital_status',
        'introduction',            // Giới thiệu bản thân
        'current_residence',       // Chỗ ở hiện tại
        'working_province',        // Tỉnh/thành làm việc
        'degree',                  // Bằng cấp
        'current_salary',          // Mức lương hiện tại
        'expected_salary_min',     // Mức lương mong muốn tối thiểu
        'expected_salary_max'      // Mức lương mong muốn tối đa
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function location()
    {
        return $this->belongsTo(CommonLocation::class, 'location_id');
    }
}
