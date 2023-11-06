<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'image'=> fake()->imageUrl(),
            'title' => fake()->sentence(),
            'descripcion' => fake()->text(),
            'price' => fake()->numberBetween(100, 1000),
            'lawyer_id' => fake()->numberBetween(1, 20)
        ];
    }
}
