<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::disk('public')->deleteDirectory('img');
        Storage::disk('public')->makeDirectory('img');

        Post::factory(10)->create();

        // Verificar imágenes creadas
        $images = Storage::disk('public')->allFiles('img');
        $this->command->info(count($images) . ' imágenes fueron creadas en storage/app/public/img/');
    }
}
