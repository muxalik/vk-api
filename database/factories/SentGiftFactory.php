<?php

namespace Database\Factories;

use App\Enums\Currencies;
use App\Models\Gift;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SentGift>
 */
class SentGiftFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'gift_id' => randomOrCreate(Gift::class),
            'recipient_id' => randomOrCreate(User::class),
            'sender_id' => randomOrCreate(User::class),
            'message' => fake()->text(),
            'is_private' => fake()->boolean(),
            'price' => fake()->numberBetween(1, 10),
            'currency' => Currencies::VOTE->value,
        ];
    }
}
