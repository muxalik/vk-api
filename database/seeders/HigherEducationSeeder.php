<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class HigherEducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = Cache::get('cities');
        $educationPlaces = Cache::get('education_places');
        $faculties = Cache::get('faculties');
        $studyPrograms = Cache::get('study_programs');
        $users = Cache::get('users');
        $higherEducations = [];

        for ($i = 0; $i < 10; $i++) {
            $higherEducations[] = [
                'id' => $i + 1,
                'city_id' => fake()->randomElement($cities)['id'],
                'education_place_id' => fake()->randomElement($educationPlaces)['id'],
                'faculty_id' => fake()->randomElement($faculties)['id'],
                'study_program_id' => fake()->randomElement($studyPrograms)['id'],
                'graduation_year' => fake()->year(),
                'user_id' => fake()->randomElement($users)['id'],
                'created_at' => now()->toDateTimeLocalString(),
                'updated_at' => now()->toDateTimeLocalString(),
            ];
        }

        Cache::put('higher_educations', $higherEducations);

        DB::table('higher_educations')->insert($higherEducations);
    }
}
