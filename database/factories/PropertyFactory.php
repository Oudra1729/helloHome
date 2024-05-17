<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Property; // تأكد من إضافة نموذج Property
use App\Models\User; // تأكد من استيراد نموذج User

class PropertyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Property::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::pluck('id')->random(),
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->text,
            'price' => $this->faker->numberBetween(1000000, 5000000),
            'bedrooms' => $this->faker->numberBetween(1, 5),
            'bathrooms' => $this->faker->numberBetween(1, 3),
            'status' => $this->faker->randomElement(['للبيع', 'للإيجار']),
            'type' => $this->faker->randomElement(['فيلا', 'شقة', 'منزل']),
            'city' => $this->faker->city
        ];
    }
}
