<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonDistrict extends Model
{
    use HasFactory;
    protected $fillable = ['city_id', 'name'];

    public function city()
    {
        return $this->belongsTo(CommonCity::class, 'city_id');
    }
}
