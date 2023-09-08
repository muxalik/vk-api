<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class FollowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = Cache::get('users');
        $followers = [];

        foreach ($users as $follower) {
            $randomFollowings = fake()->randomElements($users, mt_rand(0, 7));

            foreach ($randomFollowings as $following) {
                if ($follower['id'] === $following['id']) {
                    continue;
                }

                $followers[] = [
                    'follower_id' => $following['id'],
                    'following_id' => $follower['id'],
                    'created_at' => now()->toDateTimeString(),
                    'updated_at' => now()->toDateTimeString(),
                ];
            }
        }

        DB::table('followers')->insert($followers);
    }
}
