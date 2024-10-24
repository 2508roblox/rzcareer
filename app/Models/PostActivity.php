<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostActivity extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_post_id', 'resume_id', 'user_id', 'full_name', 'email', 'phone', 'status', 'is_sent_email', 'is_deleted'
    ];

    public function jobPost()
    {
        return $this->belongsTo(JobPost::class);
    }
    public function candidate()
    {
        return $this->belongsTo(Resume::class, 'resume_id'); // Sử dụng resume_id để liên kết
    }
    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
