<?php

namespace Database\Seeders;

use App\Enums\InterestType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = Cache::get('users');
        $interests = [];

        for ($i = 0; $i < 10; $i++) {
            $interests[] = [
                'id' => $i + 1,
                'type' => InterestType::randomValue(),
                'content' => fake()->text(120),
                'user_id' => fake()->randomElement($users)['id'],
                'created_at' => now()->toDateTimeLocalString(),
                'updated_at' => now()->toDateTimeLocalString(),
            ];
        }

        Cache::put('interests', $interests);

        DB::table('interests')->insert($interests);
    }
}
