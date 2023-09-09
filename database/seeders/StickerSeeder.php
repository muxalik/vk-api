<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class StickerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $files = Cache::get('files');
        $stickerPacks = Cache::get('sticker_packs');
        $stickers = [];

        for ($i = 0; $i < 10; $i++) {
            $stickers[] = [
                'id' => $i + 1,
                'image_id' => fake()->randomElement($files)['id'],
                'sticker_pack_id' => fake()->randomElement($stickerPacks)['id'],
                'created_at' => now()->toDateTimeLocalString(),
                'updated_at' => now()->toDateTimeLocalString(),
            ];
        }

        Cache::put('stickers', $stickers);

        DB::table('stickers')->insert($stickers);
    }
}
