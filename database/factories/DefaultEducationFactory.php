<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\EducationPlace;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DefaultEducation>
 */
class DefaultEducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'city_id' => randomOrCreate(City::class),
            'education_place_id' => randomOrCreate(EducationPlace::class),
            'from_year' => fake()->year(),
            'to_year' => fake()->year(),
            'graduation_year' => fake()->year(),
            'specialization' => fake()->words(mt_rand(2, 4), true),
            'user_id' => randomOrCreate(User::class),
        ];
    }
}
