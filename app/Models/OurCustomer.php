<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class OurCustomer extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'customer_name',
        'manufacture_id',
        'vehicle_model_id',
        'status',
        'image_count',
    ];

    public function manufacture()
    {
        return $this->belongsTo(Manufacture::class);
    }

    public function vehicleModel()
    {
        return $this->belongsTo(VehicleModel::class);
    }
}
