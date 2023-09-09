<?php

namespace Database\Seeders;

use App\Enums\Currencies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class StickerPackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $files = Cache::get('files');
        $stickerPacks = [];

        for ($i = 0; $i < 10; $i++) {
            $stickerPacks[] = [
                'id' => $i + 1,
                'name' => fake()->words(mt_rand(2, 5), true),
                'image_id' => fake()->randomElement($files)['id'],
                'price' => fake()->numberBetween(5, 30),
                'currency' => Currencies::VOTE->value,
                'condition' => null,
                'created_at' => now()->toDateTimeLocalString(),
                'updated_at' => now()->toDateTimeLocalString(),
            ];
        }

        Cache::put('sticker_packs', $stickerPacks);

        DB::table('sticker_packs')->insert($stickerPacks);
    }
}
