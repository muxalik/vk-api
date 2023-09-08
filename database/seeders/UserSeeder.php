<?php

namespace Database\Seeders;

use App\Enums\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = Cache::get('cities');
        $places = Cache::get('places');
        $users = [];

        for ($i = 0; $i < 10; $i++) {
            $users[] = [
                'id' => $i + 1,
                'first_name' => fake()->firstName(),
                'last_name' => fake()->lastName(),
                'gender' => Gender::randomValue(),
                'nickname' => fake()->userName(),
                'birthday' => fake()->dateTime(),
                'email' => fake()->unique()->safeEmail(),
                'email_verified_at' => now(),
                'city_id' => fake()->randomElement($cities)['id'],
                'home_id' => fake()->randomElement($places)['id'],
                'alt_phone' => fake()->regexify('+\d (\d{3}) \d{3}-\d{2}-\d{2}'),
                'skype' => fake()->word(),
                'website' => fake()->url(),
                'notification_email' => fake()->safeEmail(),
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
                'created_at' => now()->toDateTimeLocalString(),
                'updated_at' => now()->toDateTimeLocalString(),
            ];
        }

        Cache::put('users', $users);

        DB::table('users')->insert($users);
    }
}
