<?php

namespace Database\Seeders;

use App\Enums\Currencies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SentGiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gifts = Cache::get('gifts');
        $users = Cache::get('users');
        $sentGifts = [];

        for ($i = 0; $i < 10; $i++) {
            $sentGifts[] = [
                'id' => $i + 1,
                'gift_id' => fake()->randomElement($gifts)['id'],
                'recipient_id' => fake()->randomElement($users)['id'],
                'sender_id' => fake()->randomElement($users)['id'],
                'message' => fake()->text(),
                'is_private' => fake()->boolean(),
                'price' => fake()->numberBetween(1, 10),
                'currency' => Currencies::VOTE->value,
                'created_at' => now()->toDateTimeLocalString(),
                'updated_at' => now()->toDateTimeLocalString(),
            ];
        }

        Cache::put('sent_gifts', $sentGifts);

        DB::table('sent_gifts')->insert($sentGifts);
    }
}
