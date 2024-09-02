<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeekerProfile extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'location_id', 'phone', 'birthday', 'gender', 'marital_status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function location()
    {
        return $this->belongsTo(CommonLocation::class, 'location_id');
    }
}
