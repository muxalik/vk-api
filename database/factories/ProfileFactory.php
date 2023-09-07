<?php

namespace Database\Factories;

use App\Enums\RelationshipType;
use App\Models\File;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hometown' => fake()->city(),
            'cover' => randomOrCreate(File::class),
            'brief_info' => fake()->text(30),
            'relationship' => RelationshipType::randomValue(),
            'user_id' => randomOrCreate(User::class),
        ];
    }
}
