<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class EducationPlaceFacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $places = Cache::get('education_places');
        $faculties = Cache::get('faculties');
        $rows = [];

        foreach ($places as $place) {
            $randomFaculties = fake()->randomElements($faculties, mt_rand(1, 5));

            foreach ($randomFaculties as $faculty) {
                $rows[] = [
                    'education_place_id' => $place['id'],
                    'faculty_id' => $faculty['id'],
                ];
            }
        }

        DB::table('education_place_faculty')->insert($rows);
    }
}
