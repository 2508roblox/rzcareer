<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeCertificate extends Model
{
    use HasFactory;
    protected $fillable = [
        'resume_id', 'name', 'training_place', 'start_date', 'expiration_date', 'description'
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
