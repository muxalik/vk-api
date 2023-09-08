<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class FriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = Cache::get('users');
        $rows = [];

        foreach ($users as $user) {
            $friends = fake()->randomElements($users, mt_rand(0, 7));

            foreach ($friends as $friend) {
                $rows[] = [
                    'user_id' => $user['id'],
                    'friend_id' => $friend['id'],
                    'created_at' => now()->toDateTimeString(),
                    'updated_at' => now()->toDateTimeString(),
                ];
            }
        }

        DB::table('friends')->insert($rows);
    }
}
