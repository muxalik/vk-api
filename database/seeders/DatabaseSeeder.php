<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PlaceSeeder::class,
            CountrySeeder::class,
            CitySeeder::class,
            FileSeeder::class,
            UserSeeder::class,
            LanguageSeeder::class,
            LanguageUserSeeder::class,
            CommunitySeeder::class,
            EducationPlaceSeeder::class,
            FacultySeeder::class,
            EducationPlaceFacultySeeder::class,
            StudyProgramSeeder::class,
            ProfileSeeder::class,
            InterestSeeder::class,
            DefaultEducationSeeder::class,
            HigherEducationSeeder::class,
            WorkPlaceSeeder::class,
            MilitaryServiceSeeder::class,
            PersonalViewSeeder::class,
            CommunityUserSeeder::class,
            FollowerSeeder::class,
            FriendSeeder::class,
        ]);

        Cache::flush();
    }
}
