<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;
    protected $fillable = ['candidate_id', 'status', 'slot_id', 'feedback', 'job_post_id'];

    // An interview belongs to a user (candidate)
    public function candidate()
    {
        return $this->belongsTo(User::class, 'candidate_id');
    }

    // An interview belongs to a specific interview slot
    public function slot()
    {
        return $this->belongsTo(InterviewSlot::class, 'slot_id');
    }

    public function jobPost()
{
    return $this->belongsTo(JobPost::class, 'job_post_id'); // Đảm bảo rằng bạn có trường job_post_id trong bảng interviews
}

public function interviewer() // Lấy thông tin người phỏng vấn từ slot
{
    return $this->hasOneThrough(User::class, InterviewSlot::class, 'id', 'id', 'slot_id', 'interviewer_id');
}

}
