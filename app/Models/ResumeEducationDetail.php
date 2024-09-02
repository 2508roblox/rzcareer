<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeEducationDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'resume_id', 'degree_name', 'major', 'training_place', 'start_date', 'completed_date', 'description'
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
