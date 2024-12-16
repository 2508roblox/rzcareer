<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'image_url',
        'image_public_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
