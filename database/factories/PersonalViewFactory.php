<?php

namespace Database\Factories;

use App\Enums\ImportantQuality;
use App\Enums\PersonalPriority;
use App\Enums\PersonalView;
use App\Enums\PoliticalView;
use App\Enums\ReligionType;
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
            'political_views' => PoliticalView::randomValue(),
            'religion' => ReligionType::randomValue(),
            'personal_priority' => PersonalPriority::randomValue(),
            'important_in_others' => ImportantQuality::randomValue(),
            'smoking' => PersonalView::randomValue(),
            'alcohol' => PersonalView::randomValue(),
        ];
    }
}
