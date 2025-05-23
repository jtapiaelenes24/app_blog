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

        // $imagenNombre = 'test_gd_image.jpg'; // Imagen fija para todos los posts

        // Generar nombre único para la imagen
        $imageName = 'post_' . time() . '_' . $this->faker->unique()->randomNumber(5) . '.jpg';
        $imagePath = 'img/' . $imageName;
        $fullPath = storage_path('app/public/' . $imagePath);

        // Crear directorio si no existe
        if (!file_exists(dirname($fullPath))) {
            mkdir(dirname($fullPath), 0755, true);
        }

        // Descargar imagen de Picsum y guardarla
        try {
            $imageContent = file_get_contents('https://picsum.photos/800/600?random=' . mt_rand());
            file_put_contents($fullPath, $imageContent);
        } catch (\Exception $e) {
            // Si falla la descarga, usar una imagen por defecto
            $imagePath = 'img/default.jpg';
        }

        return [

            // Creamos los datos ficticios
            'titulo' => $name,
            'slug' => Str::slug($name, '-'),
            'fecha' => now(),
            'extracto' => $this->faker->text(),
            'descripcion' => $this->faker->text(),
            // 'imagen' => 'img/' . $imagenNombre,
            'imagen' => $imagePath,

        ];
    }
}
