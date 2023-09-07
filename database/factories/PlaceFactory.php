<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'city' => fake()->city(),
            'district' => fake()->word(),
            'street' => fake()->streetAddress(),
            'name' => fake()->words(mt_rand(3, 5), true),
            'house_number' => fake()->regexify('\d{1,2}[A-Za-z]'),
        ];
    }
}
