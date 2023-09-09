<?php

namespace Database\Seeders;

use App\Enums\ImportantQualities;
use App\Enums\PersonalPriorities;
use App\Enums\PersonalViews;
use App\Enums\PoliticalViews;
use App\Enums\Religions;
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
                'political_views' => PoliticalViews::randomValue(),
                'religion' => Religions::randomValue(),
                'personal_priority' => PersonalPriorities::randomValue(),
                'important_in_others' => ImportantQualities::randomValue(),
                'smoking' => PersonalViews::randomValue(),
                'alcohol' => PersonalViews::randomValue(),
                'created_at' => now()->toDateTimeLocalString(),
                'updated_at' => now()->toDateTimeLocalString(),
            ];
        }

        Cache::put('personal_views', $personalViews);

        DB::table('personal_views')->insert($personalViews);
    }
}
