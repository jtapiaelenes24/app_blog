<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str; // Usamos esta ruta para generar los slugs

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $name = $this->faker->sentence();

        return [

            // Creamos los datos ficticios
            'titulo' => $name,
            'slug' => Str::slug($name, '-'),
            'fecha' => now(),
            'extracto' => $this->faker->text(),
            'descripcion' => $this->faker->text(),
            // 'imagen' => 'img/' . $this->faker->image('public/storage/img', 640, 480, null, false)
            'imagen' => 'img/' . $this->faker->imageUrl('public/storage/img', 640, 480, null, false)

        ];
    }
}
