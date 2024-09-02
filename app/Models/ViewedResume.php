<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewedResume extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'company_id', 'resume_id', 'views'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
