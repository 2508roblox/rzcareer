<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterviewSlot extends Model
{
    use HasFactory;
    protected $fillable = ['start_time', 'end_time', 'location', 'interviewer_id'];

    // One interview slot belongs to one interviewer
    public function interviewer()
    {
        return $this->belongsTo(Interviewer::class, 'interviewer_id');
    }

    // One interview slot can have many interviews
    public function interviews()
    {
        return $this->hasMany(Interview::class, 'slot_id');
    }
}
