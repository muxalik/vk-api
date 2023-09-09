<?php

namespace Database\Seeders;

use App\Enums\EducationTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class EducationPlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = Cache::get('cities');
        $education_places = [];

        for ($i = 0; $i < 10; $i++) {
            $education_places[] = [
                'id' => $i + 1,
                'name' => fake()->words(mt_rand(4, 7), true),
                'type' => EducationTypes::randomValue(),
                'city_id' => fake()->randomElement($cities)['id'],
                'created_at' => now()->toDateTimeLocalString(),
                'updated_at' => now()->toDateTimeLocalString(),
            ];
        }

        Cache::put('education_places', $education_places);

        DB::table('education_places')->insert($education_places);
    }
}
