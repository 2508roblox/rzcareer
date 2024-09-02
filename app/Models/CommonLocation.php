<?php

namespace App\Models;

use App\Models\CommonCity;
use App\Models\CommonDistrict;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommonLocation extends Model
{
    use HasFactory;
    protected $fillable = [
        'address',
        'lat',
        'lng',
        'district_id',
        'city_id',
    ];

    public function district()
    {
        return $this->belongsTo(CommonDistrict::class, 'district_id');
    }

    public function city()
    {
        return $this->belongsTo(CommonCity::class, 'city_id');
    }
    public function getLocationAttribute(): array
    {
        return [
            "lat" => (float)$this->lat,
            "lng" => (float)$this->lng,
        ];
    }
    public function setLocationAttribute(?array $location): void
    {
        if (is_array($location))
        {
            $this->attributes['lat'] = $location['lat'];
            $this->attributes['lng'] = $location['lng'];
            unset($this->attributes['location']);
        }
    }
    public static function getLatLngAttributes(): array
    {
        return [
            'lat' => 'lat',
            'lng' => 'lng',
        ];
    }
    public static function getComputedLocation(): string
    {
        return 'location';
    }
}
