<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Community>
 */
class CommunityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(mt_rand(1, 3), true),
            'nickname' => str(fake()->words(mt_rand(1, 3), true))->snake(),
            'description' => fake()->text(),
            'website' => fake()->url(),
        ];
    }
}
