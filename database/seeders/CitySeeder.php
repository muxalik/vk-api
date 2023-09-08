<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = Cache::get('countries');
        $cities = [];

        for ($i = 0; $i < 10; $i++) {
            $cities[] = [
                'id' => $i + 1,
                'name' => fake()->country(),
                'country_id' => fake()->randomElement($countries)['id'],
                'created_at' => now()->toDateTimeLocalString(),
                'updated_at' => now()->toDateTimeLocalString(),
            ];
        }

        Cache::put('cities', $cities);

        DB::table('cities')->insert($cities);
    }
}
