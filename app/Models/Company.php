<?php

namespace App\Models;

use App\Models\CommonLocation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Cache;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
        'user_id',
        'company_name',
        'slug',
        'company_image_url',
        'company_image_public_id',
        'company_cover_image_url',
        'company_cover_image_public_id',
        'facebook_url',
        'youtube_url',
        'linkedin_url',
        'company_email',
        'company_phone',
        'website_url',
        'tax_code',
        'since',
        'field_operation',
        'description',
        'employee_size'
    ];

    public function location()
    {
        return $this->belongsTo(CommonLocation::class);
    }

    public function reviews()
    {
        return $this->hasMany(CompanyReview::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobPosts()
    {
        return $this->hasMany(JobPost::class);
    }

    public function followedBy()
    {
        return $this->hasMany(FollowedCompany::class);
    }

    public function companyImages()
    {
        return $this->hasMany(CompanyImage::class);
    }

    public function viewedResumes()
    {
        return $this->hasMany(ViewedResume::class);
    }

    public function getJobPostsCountAttribute()
    {
        return $this->jobPosts()->count();
    }

    public function getCityNameAttribute()
    {
        return $this->location ? $this->location->city->name : null;
    }

    public function getDistrictNameAttribute()
    {
        return $this->location ? $this->location->district->name : null;
    }

    protected static function booted()
    {
        // Clear cache when a company is created, updated, or deleted
        static::saved(function () {
            Cache::forget('companies');
        });

        static::deleted(function () {
            Cache::forget('companies');
        });
    }
}
