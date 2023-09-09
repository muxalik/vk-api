<?php

namespace Database\Seeders;

use App\Enums\Languages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [];

        foreach (Languages::values() as $i => $language) {
            $languages[] = [
                'id' => $i + 1,
                'name' => $language,
                'created_at' => now()->toDateTimeLocalString(),
                'updated_at' => now()->toDateTimeLocalString(),
            ];
        }

        Cache::put('languages', $languages);

        DB::table('languages')->insert($languages);
    }
}
