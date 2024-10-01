<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'user_id',
        'content',
        'salary_benefit',
        'training_opportunity',
        'employee_care',
        'company_culture',
        'workplace_environment',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}