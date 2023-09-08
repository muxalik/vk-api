<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class WorkPlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = Cache::get('cities');
        $communities = Cache::get('communities');
        $users = Cache::get('users');
        $workPlaces = [];

        for ($i = 0; $i < 10; $i++) {
            $workPlaces[] = [
                'id' => $i + 1,
                'community_id' => fake()->randomElement($communities)['id'],
                'company_name' => fake()->word(),
                'city_id' => fake()->randomElement($cities)['id'],
                'from_year' => fake()->year(),
                'to_year' => fake()->year(),
                'position' => fake()->words(mt_rand(1, 3), true),
                'user_id' => fake()->randomElement($users)['id'],
                'created_at' => now()->toDateTimeLocalString(),
                'updated_at' => now()->toDateTimeLocalString(),
            ];
        }

        Cache::put('work_places', $workPlaces);

        DB::table('work_places')->insert($workPlaces);
    }
}
