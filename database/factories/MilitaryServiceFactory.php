<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MilitaryService>
 */
class MilitaryServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'country_id' => randomOrCreate(Country::class),
            'unit' => fake()->words(mt_rand(1, 3), true),
            'from_year' => fake()->year(),
            'to_year' => fake()->year(),
            'user_id' => randomOrCreate(User::class),
        ];
    }
}
