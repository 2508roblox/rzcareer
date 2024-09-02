<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeAdvancedSkill extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'level'  ,'resume_id',
    ];

    public function resume()
       {
           return $this->belongsTo(Resume::class);
       }
}
