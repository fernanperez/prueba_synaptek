<?php

namespace Database\Factories;

use App\Models\blog;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str as Str;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $titulo = $this->faker->sentence(4);
        return [
            'titulo' => $titulo,
            'descripcion' => $this->faker->paragraph(6),
            'slug' => Str::slug($titulo),
            'imagen' => $this->faker->imageUrl(),
            'estado' => $this->faker->numberBetween(0, 1),
            'categoria_id' => Categoria::inRandomOrder()->first()->id,
            'user_id' => User::whereIn('rol', [0, 1])->inRandomOrder()->first()->id,
        ];
    }
}
