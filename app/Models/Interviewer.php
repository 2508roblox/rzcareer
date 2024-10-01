<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interviewer extends Model
{
    use HasFactory;
    protected $fillable = ['full_name', 'email', 'position'];

    // One interviewer can have many interview slots
    public function slots()
    {
        return $this->hasMany(InterviewSlot::class, 'interviewer_id');
    }
}
