<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Image;
use App\Models\Property;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

     public function definition()
     {
         $property_id = Property::query()->inRandomOrder()->first();

         return [
             'property_id' => $property_id ? $property_id->id : null,
             'image_url' => $this->faker->imageUrl(640, 480, 'houses', true)
         ];
     }
}
