<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CommunityUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $communities = Cache::get('communities');
        $users = Cache::get('users');
        $rows = [];

        foreach ($communities as $community) {
            $randomUsers = fake()->randomElements($users, mt_rand(3, 7));

            foreach ($randomUsers as $randomUser) {
                $rows[] = [
                    'community_id' => $community['id'],
                    'user_id' => $randomUser['id'],
                    'created_at' => now()->toDateTimeString(),
                    'updated_at' => now()->toDateTimeString(),
                ];
            }
        }

        DB::table('community_user')->insert($rows);
    }
}
