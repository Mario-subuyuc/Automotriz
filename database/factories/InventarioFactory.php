<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventario>
 */
class InventarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'marca' => $this->faker->randomElement(['Toyota', 'Ford', 'Chevrolet', 'Honda', 'Nissan']),
            'modelo' => $this->faker->word(),
            'anio' => $this->faker->numberBetween(2000, 2025),
            'precio' => $this->faker->randomFloat(2, 5000, 50000),
            'estado' => $this->faker->randomElement(['Disponible', 'Vendido', 'En mantenimiento']),
            'kilometraje' => $this->faker->numberBetween(0, 200000),
            'color' => $this->faker->safeColorName(),
        ];
    }
}
