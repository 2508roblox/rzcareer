<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonCareer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon_url', 
        'app_icon_name'
    ];

    public function jobPosts()
    {
        return $this->hasMany(JobPost::class, 'career_id');
    }

    public function companies() 
    {
        return $this->hasMany(Company::class, 'field_operation', 'name');
    }

    public function resumes()
    {
        return $this->hasMany(Resume::class, 'career_id');
    }
}
