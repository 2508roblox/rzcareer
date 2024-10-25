<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedResume extends Model
{
    use HasFactory;

    protected $fillable = [
        'resume_id',
        'company_id'
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class, 'resume_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // public function user()
    // {
    //     // Truy cập user_id từ resume
    //     return $this->resume->user ?? null; // Trả về null nếu không có resume
    // }
}
