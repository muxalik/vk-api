<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $places = [];

        for ($i = 0; $i < 10; $i++) {
            $places[] = [
                'id' => $i + 1,
                'city' => fake()->city(),
                'district' => fake()->word(),
                'street' => fake()->streetAddress(),
                'name' => fake()->words(mt_rand(3, 5), true),
                'house_number' => fake()->regexify('\d{1,2}[A-Za-z]'),
                'created_at' => now()->toDateTimeLocalString(),
                'updated_at' => now()->toDateTimeLocalString(),
            ];
        }

        Cache::put('places', $places);

        DB::table('places')->insert($places);
    }
}
