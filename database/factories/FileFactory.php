<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $folder = storage_path('app/avatars');
        $files = glob($folder . '/*.*');
        $index = array_rand($files);
        $file = $files[$index];
        $ext = pathinfo($file)['extension'];
        $contents = file_get_contents($file);

        $filename = Str::random(32) . '.' . $ext;
        $filepath = 'images/';
        $file = Storage::put('public/' . $filepath . $filename, $contents);

        return [
            'name' => $filename,
            'path' => $filepath,
        ];
    }
}
