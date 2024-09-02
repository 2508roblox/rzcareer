<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPostNotification extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'city_id', 'career_id', 'job_name', 'position', 'experience', 'salary', 'frequency', 'is_active', 'salary_type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(CommonCity::class);
    }

    public function career()
    {
        return $this->belongsTo(CommonCareer::class);
    }
}
