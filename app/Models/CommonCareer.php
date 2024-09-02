<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonCareer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'icon_url', 'app_icon_name'];

}
