<?php

namespace Database\Factories;

use App\Models\Community;
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
            ''
        ];
    }

    public function withCommunity(): static
    {
        $community = Community::factory()->create();

        return $this->state(function (array $attributes) use ($community) {
            return [
                'community_id' => $community->id,
            ];
        });
    }
}
