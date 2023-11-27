<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lawyer>
 */
class LawyerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'firstName' => fake()->firstName(),
            'lastName' => fake()->lastName(),
            'topic' => fake()->text(),
            'address'=> fake()->address(),
            'phone'=> fake()->phoneNumber(),
            'email' => fake()->email(),
            'solicitud' => 'aceptada',
        ];
    }
}
