<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\EducationPlace;
use App\Models\Faculty;
use App\Models\StudyProgram;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HigherEducation>
 */
class HigherEducationFactory extends Factory
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
            'faculty_id' => randomOrCreate(Faculty::class),
            'study_program_id' => randomOrCreate(StudyProgram::class),
            'graduation_year' => fake()->year(),
        ];
    }
}
