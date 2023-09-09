<?php

namespace Database\Factories;

use App\Enums\ImportantQualities;
use App\Enums\PersonalPriorities;
use App\Enums\PersonalViews;
use App\Enums\PoliticalViews;
use App\Enums\Religions;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PersonlView>
 */
class PersonalViewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => randomOrCreate(User::class),
            'political_views' => PoliticalViews::randomValue(),
            'religion' => Religions::randomValue(),
            'personal_priority' => PersonalPriorities::randomValue(),
            'important_in_others' => ImportantQualities::randomValue(),
            'smoking' => PersonalViews::randomValue(),
            'alcohol' => PersonalViews::randomValue(),
        ];
    }
}
