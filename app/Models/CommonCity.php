<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonCity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function jobPosts()
    {
        return $this->hasMany(
            JobPost::class,
            'location_id'
        ); // Assuming location_id references CommonLocation which references CommonCity
    }

    public function locations() 
    {
        return $this->hasMany(
            CommonLocation::class,
            'city_id'
        );
    }
}
