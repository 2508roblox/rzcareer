<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeExperienceDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'resume_id', 'job_name', 'start_date', 'end_date', 'description', 'company_name'
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
