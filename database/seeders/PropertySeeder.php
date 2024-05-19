<?php
use Illuminate\Database\Seeder;
use App\Models\Property;
use App\Models\Image;

class PropertySeeder extends Seeder
{
    public function run()
    {
        // Create 50 properties
        Property::factory()->count(10)->create()->each(function ($property) {
            // For each property, create 3 images
            Image::factory()->count(3)->create(['property_id' => $property->id]);
        });
    }
}

