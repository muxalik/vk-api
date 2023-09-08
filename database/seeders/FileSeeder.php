<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $files = [];

        for ($i = 0; $i < 10; $i++) {
            $file = $this->generateFile();

            $files[] = [
                'id' => $i + 1,
                'name' => $file['name'],
                'path' => $file['path'],
                'created_at' => now()->toDateTimeLocalString(),
                'updated_at' => now()->toDateTimeLocalString(),
            ];
        }

        Cache::put('files', $files);

        DB::table('files')->insert($files);
    }

    /** @return ['name' => string, 'path' => string] */
    protected function generateFile(): array
    {
        $folder = storage_path('app/avatars');
        $files = glob($folder . '/*.*');
        $index = array_rand($files);
        $file = $files[$index];
        $ext = pathinfo($file)['extension'];
        $contents = file_get_contents($file);

        $name = Str::random(32) . '.' . $ext;
        $path = 'images/';
        $file = Storage::put('public/' . $path . $name, $contents);

        return compact('name', 'path');
    }
}
