<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class StudyProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faculties = Cache::get('faculties');
        $programs = [];

        for ($i = 0; $i < 10; $i++) {
            $programs[] = [
                'id' => $i + 1,
                'name' => fake()->words(mt_rand(3, 5), true),
                'faculty_id' => fake()->randomElement($faculties)['id'],
                'created_at' => now()->toDateTimeLocalString(),
                'updated_at' => now()->toDateTimeLocalString(),
            ];
        }

        Cache::put('study_programs', $programs);

        DB::table('study_programs')->insert($programs);
    }
}
