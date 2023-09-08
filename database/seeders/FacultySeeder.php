<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faculties = [];

        for ($i = 0; $i < 10; $i++) {
            $faculties[] = [
                'id' => $i + 1,
                'name' => fake()->words(mt_rand(3, 4), true),
                'created_at' => now()->toDateTimeLocalString(),
                'updated_at' => now()->toDateTimeLocalString(),
            ];
        }

        Cache::put('faculties', $faculties);

        DB::table('faculties')->insert($faculties);
    }
}
