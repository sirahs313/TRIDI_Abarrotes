<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Articulo>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->firstName,
            'apeP' => $this->faker->lastName,
            'apeM' => $this->faker->lastName,
            'CURP' => $this->faker->regexify('[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}'),
        ];
    }
}
