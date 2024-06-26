<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    public function images()
    {
        return $this->hasMany(Image::class, 'property_id');
    }
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'price',
        'bedrooms',
        'bathrooms',
        'status',
        'space',
        'type',
        'city'
    ];
}
