<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Property;
use App\Models\Image;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Create 5 users, each with 5 properties, each with 3 images
        User::factory(5)->create()->each(function ($user) {
            $user->properties()->saveMany(
                Property::factory(5)->make()
            )->each(function ($property) {
                $property->images()->saveMany(
                    Image::factory(3)->make()
                );
            });
        });

        // Additional code to create a specific user
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
