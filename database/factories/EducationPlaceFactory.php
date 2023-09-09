<?php

namespace Database\Factories;

use App\Enums\EducationTypes;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EducationPlace>
 */
class EducationPlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(mt_rand(4, 7), true),
            'type' => EducationTypes::randomValue(),
            'city_id' => randomOrCreate(City::class),
        ];
    }
}
