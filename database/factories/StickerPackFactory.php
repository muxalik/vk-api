<?php

namespace Database\Factories;

use App\Enums\Currencies;
use App\Models\File;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StickerPack>
 */
class StickerPackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(mt_rand(2, 5), true),
            'image_id' => randomOrCreate(File::class),
            'price' => fake()->numberBetween(5, 30),
            'currency' => Currencies::VOTE->value,
            'condition' => null,
        ];
    }
}
