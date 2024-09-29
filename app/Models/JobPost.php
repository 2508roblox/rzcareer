<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;
    protected $fillable = [
        'career_id', 'company_id', 'location_id', 'user_id', 'job_name', 'slug', 'deadline', 'quantity', 'gender_required', 'job_description', 'job_requirement', 'benefits_enjoyed', 'position', 'type_of_workplace', 'experience', 'academic_level', 'job_type', 'salary_min', 'salary_max', 'salary_type', 'is_hot', 'is_urgent', 'contact_person_name', 'contact_person_phone', 'contact_person_email', 'views', 'shares', 'status'
    ];

    public function career()
    {
        return $this->belongsTo(CommonCareer::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function location()
    {
        return $this->belongsTo(CommonLocation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function city()
    {
        return $this->belongsTo(CommonCity::class, 'location_id');
    }
    public function postActivities()
    {
        return $this->hasMany(PostActivity::class);
    }
}
