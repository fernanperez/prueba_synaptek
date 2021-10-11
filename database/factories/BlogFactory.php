<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence(4),
            'descripcion' => $this->faker->paragraph(6),
            'imagen' => $this->faker->imageUrl(),
            'estado' => $this->faker->numberBetween(0, 1),
            'categoria_id' => 1,
            'user_id' => Auth::user()->id
        ];
    }
}
