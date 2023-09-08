<?php

namespace Database\Seeders;

use App\Enums\ImportantQuality;
use App\Enums\PersonalPriority;
use App\Enums\PersonalView;
use App\Enums\PoliticalView;
use App\Enums\ReligionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class PersonalViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = Cache::get('users');
        $personalViews = [];

        for ($i = 0; $i < 10; $i++) {
            $personalViews[] = [
                'id' => $i + 1,
                'user_id' => fake()->randomElement($users)['id'],
                'political_views' => PoliticalView::randomValue(),
                'religion' => ReligionType::randomValue(),
                'personal_priority' => PersonalPriority::randomValue(),
                'important_in_others' => ImportantQuality::randomValue(),
                'smoking' => PersonalView::randomValue(),
                'alcohol' => PersonalView::randomValue(),
                'created_at' => now()->toDateTimeLocalString(),
                'updated_at' => now()->toDateTimeLocalString(),
            ];
        }

        Cache::put('personal_views', $personalViews);

        DB::table('personal_views')->insert($personalViews);
    }
}
