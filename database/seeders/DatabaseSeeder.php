<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
// استيراد النماذج
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
        // إنشاء 10 مستخدمين
        User::factory(10)->create()->each(function ($user) {
            $user->properties()->saveMany(
                Property::factory(5)->make()
            )->each(function ($property) {
                $property->images()->saveMany(
                    Image::factory(3)->make()
                );
            });
        });

        // كود إضافي لإنشاء مستخدم محدد
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
