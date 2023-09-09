<?php

namespace Database\Seeders;

use App\Enums\Relationships;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = Cache::get('users');
        $files = Cache::get('files');
        $profiles = [];

        for ($i = 0; $i < 10; $i++) {
            $profiles[] = [
                'id' => $i + 1,
                'hometown' => fake()->city(),
                'cover_id' => fake()->randomElement($files)['id'],
                'brief_info' => fake()->text(30),
                'relationship' => Relationships::randomValue(),
                'user_id' => fake()->randomElement($users)['id'],
                'created_at' => now()->toDateTimeLocalString(),
                'updated_at' => now()->toDateTimeLocalString(),
            ];
        }

        Cache::put('profiles', $profiles);

        DB::table('profiles')->insert($profiles);
    }
}
