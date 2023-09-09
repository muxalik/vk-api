<?php

namespace Database\Seeders;

use App\Enums\Currencies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class GiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $files = Cache::get('files');
        $gifts = [];

        for ($i = 0; $i < 10; $i++) {
            $gifts[] = [
                'id' => $i + 1,
                'image_id' => fake()->randomElement($files)['id'],      
                'price' => fake()->numberBetween(1, 10),
                'currency' => Currencies::VOTE->value,
                'created_at' => now()->toDateTimeLocalString(),
                'updated_at' => now()->toDateTimeLocalString(),
            ];
        }

        Cache::put('gifts', $gifts);

        DB::table('gifts')->insert($gifts);
    }
}
