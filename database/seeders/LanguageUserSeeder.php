<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class LanguageUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = Cache::get('languages');
        $users = Cache::get('users');
        $rows = [];

        foreach ($users as $user) {
            $randomLanguages = fake()->randomElements($languages, mt_rand(1, 2));

            foreach ($randomLanguages as $randomLanguage) {
                $rows[] = [
                    'language_id' => $randomLanguage['id'],
                    'user_id' => $user['id'],
                ];
            }
        }

        DB::table('language_user')->insert($rows);
    }
}
