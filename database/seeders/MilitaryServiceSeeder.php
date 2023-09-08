<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MilitaryServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = Cache::get('countries');
        $users = Cache::get('users');
        $militaryServices = [];

        for ($i = 0; $i < 10; $i++) {
            $militaryServices[] = [
                'id' => $i + 1,
                'country_id' => fake()->randomElement($countries)['id'],
                'unit' => fake()->words(mt_rand(1, 3), true),
                'from_year' => fake()->year(),
                'to_year' => fake()->year(),
                'user_id' => fake()->randomElement($users)['id'],
                'created_at' => now()->toDateTimeLocalString(),
                'updated_at' => now()->toDateTimeLocalString(),
            ];
        }

        Cache::put('military_services', $militaryServices);

        DB::table('military_services')->insert($militaryServices);
    }
}
