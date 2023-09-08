<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class DefaultEducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = Cache::get('cities');
        $educationPlaces = Cache::get('education_places');
        $users = Cache::get('users');
        $educations = [];

        for ($i = 0; $i < 10; $i++) {
            $educations[] = [
                'id' => $i + 1,
                'city_id' => fake()->randomElement($cities)['id'],
                'education_place_id' => fake()->randomElement($educationPlaces)['id'],
                'from_year' => fake()->year(),
                'to_year' => fake()->year(),
                'graduation_year' => fake()->year(),
                'specialization' => fake()->words(mt_rand(2, 4), true),
                'user_id' => fake()->randomElement($users)['id'],
                'created_at' => now()->toDateTimeLocalString(),
                'updated_at' => now()->toDateTimeLocalString(),
            ];
        }

        Cache::put('default_educations', $educations);

        DB::table('default_educations')->insert($educations);
    }
}
