<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Community;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkPlace>
 */
class WorkPlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'community_id' => randomOrCreate(Community::class),
            'company_name' => fake()->word(),
            'city_id' => randomOrCreate(City::class),
            'from_year' => fake()->year(),
            'to_year' => fake()->year(),
            'position' => fake()->words(mt_rand(1, 3), true),
            'user_id' => randomOrCreate(User::class),
        ];
    }
}
