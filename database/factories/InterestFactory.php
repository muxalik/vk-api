<?php

namespace Database\Factories;

use App\Enums\InterestType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Interest>
 */
class InterestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => InterestType::randomValue(),
            'content' => fake()->text(120),
            'user_id' => randomOrCreate(User::class),
        ];
    }
}
