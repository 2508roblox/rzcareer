<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;
    protected $fillable = ['candidate_id', 'status', 'slot_id', 'feedback'];

    // An interview belongs to a user (candidate)
    public function candidate()
    {
        return $this->belongsTo(User::class, 'candidate_id');
    }

    // An interview belongs to a specific interview slot
    public function slot()
    {
        return $this->belongsTo(InterviewSlot::class, 'slot_id');
    }
}
