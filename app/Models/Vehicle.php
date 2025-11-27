<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Vehicle extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $appends = ['FeaturesList', 'FuelTypeString', 'TransmissionString', 'AvailabilityString'];

    protected $casts = [
        'countries' => 'array',

        // 'features' => 'array',
    ];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function vehicleType()
    {
        return $this->belongsTo(Type::class);
    }

    public function manufacture()
    {
        return $this->belongsTo(Manufacture::class);
    }

    public function vehicleModel()
    {
        return $this->belongsTo(VehicleModel::class);
    }

    public function exColor()
    {
        return $this->belongsTo(Color::class, 'ex_color');
    }

    public function inColor()
    {
        return $this->belongsTo(Color::class, 'in_color');
    }

    // public function features()
    // {
    // dd($this->features);
    // return $this->belongsToMany(Feature::class, 'vehicles', 'id', 'features')->whereIn('id',json_decode( $this->features)??[]);
    // }

    public function getFeaturesListAttribute()
    {
        $features  = json_decode($this->features, true);
        // $features  = json_decode($features, true);
        return $features;
    }

    public function getFuelTypeStringAttribute($type)
    {
        $type = $this->attributes['fuel_type'] ?? null;
        $ft = '';
        if ($type == 'Diesel') {
            $ft = 'Diesel';
        } else if ($type == 'Petrol') {
            $ft = 'Petrol';
        } else if ($type == 'Hybrid') {
            $ft = 'Hybrid';
        } else if ($type == 'Electric') {
            $ft = 'Electric';
        }

        return $ft;
    }
    public function getTransmissionStringAttribute()
    {
        $value = $this->attributes['transmission'] ?? null;
        $t = '';
        if ($value == 'Auto') {
            $t = 'Auto';
        } else if ($value == 'Manual') {
            $t = 'Manual';
        } else if ($value == 'Triptonic') {
            $t = 'Triptonic';
        }

        return $t;
    }
    public function getAvailabilityStringAttribute($value)
    {
        $value = $this->attributes['availability'] ?? null;
        $t = '';
        if ($value == 'Available') {
            $t = 'Available';
        } else if ($value == 'Arriving') {
            $t = 'Arriving';
        } else if ($value == 'Sold') {
            $t = 'Sold';
        }

        return $t;
    }
}
