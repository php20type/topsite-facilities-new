<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'property_type_id',
        'address1',
        'address2',
        'bedrooms',
        'bathrooms',
        'parking',
        'property_service_id',
        'area'
    ];

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }

    public function propertyService()
    {
        return $this->belongsTo(PropertyService::class, 'property_service_id');
    }

    public function propertyMedia()
    {
        return $this->hasMany(PropertyMedia::class);
    }

}
