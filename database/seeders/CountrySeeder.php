<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [];

        for ($i = 0; $i < 10; $i++) {
            $countries[] = [
                'id' => $i + 1,
                'name' => fake()->country(),
                'created_at' => now()->toDateTimeLocalString(),
                'updated_at' => now()->toDateTimeLocalString(),
            ];
        }

        Cache::put('countries', $countries);

        DB::table('countries')->insert($countries);
    }
}
