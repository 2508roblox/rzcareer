<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPostService extends Model
{
    use HasFactory;

    protected $fillable = ['job_id', 'service_id', 'start_date', 'end_date', 'highlight_post', 'top_sector', 'border_effect', 'hot_effect', 'highlight_logo'];

    public function job()
    {
        return $this->belongsTo(JobPost::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
