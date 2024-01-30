<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'property_type_id',
        'address1',
        'address2',
        'bedrooms',
        'bathrooms',
        'parking',
        'area'
    ];

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }

    public function propertyMedia()
    {
        return $this->hasMany(PropertyMedia::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class)
            ->withPivot('status')
            ->withTimestamps();
    }
}
