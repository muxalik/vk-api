<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CommunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $files = Cache::get('files');
        $communities = [];

        for ($i = 0; $i < 10; $i++) {
            $communities[] = [
                'id' => $i + 1,
                'name' => fake()->words(mt_rand(1, 3), true),
                'nickname' => str(fake()->words(mt_rand(1, 3), true))->snake(),
                'description' => fake()->text(),
                'website' => fake()->url(),
                'logo_id' => fake()->randomElement($files)['id'],
                'created_at' => now()->toDateTimeLocalString(),
                'updated_at' => now()->toDateTimeLocalString(),
            ];
        }

        Cache::put('communities', $communities);

        DB::table('communities')->insert($communities);
    }
}
