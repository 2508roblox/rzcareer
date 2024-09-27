<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedResume extends Model
{
    use HasFactory;
    protected $fillable = [
        'resume_id',
        'user_id',
        'company_id'
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
