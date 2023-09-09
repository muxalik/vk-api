<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class StickerPackUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stickerPacks = Cache::get('sticker_packs');
        $users = Cache::get('users');
        $rows = [];

        foreach ($users as $user) {
            $randomPacks = fake()->randomElements($stickerPacks, mt_rand(0, 5));

            foreach ($randomPacks as $randomPack) {
                $rows[] = [
                    'sticker_pack_id' => $randomPack['id'],
                    'user_id' => $user['id'],
                    'created_at' => now()->toDateTimeString(),
                    'updated_at' => now()->toDateTimeString(),
                ];
            }
        }

        DB::table('sticker_pack_user')->insert($rows);
    }
}
