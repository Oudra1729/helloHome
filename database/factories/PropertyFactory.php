<?php
// database/factories/PropertyFactory.php

namespace Database\Factories;

use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    protected $model = Property::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->numberBetween(100000, 1000000),
            'bedrooms' => $this->faker->numberBetween(1, 5),
            'bathrooms' => $this->faker->numberBetween(1, 3),
            'status' => $this->faker->randomElement(['للبيع', 'للإيجار']),
            'type' => $this->faker->randomElement(['منزل', 'شقة']),
            'city' => $this->faker->city,
            'space' => $this->faker->numberBetween(50, 500), // Provide a value for space
        ];
    }
}
