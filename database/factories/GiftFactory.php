<?php

namespace Database\Factories;

use App\Enums\Currencies;
use App\Models\File;
use App\Models\StickerPack;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gift>
 */
class GiftFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image_id' => randomOrCreate(File::class),
            'sticker_pack_id' => randomOrCreate(StickerPack::class),
            'price' => fake()->numberBetween(1, 10),
            'currency' => Currencies::VOTE->value,
            'condition' => null,
        ];
    }
}
