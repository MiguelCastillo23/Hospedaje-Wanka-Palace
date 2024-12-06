<?php

namespace Database\Factories;

use App\Models\Reserva;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservaFactory extends Factory
{
    protected $model = Reserva::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'dni' => $this->faker->unique()->numerify('########'),
            'fecha_entrada' => $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
            'fecha_salida' => $this->faker->dateTimeBetween('+1 month', '+2 months')->format('Y-m-d'),
            'tipo_habitacion' => $this->faker->randomElement(['Matrimonial', 'Doble', 'Suite', 'Básico']),
        ];
    }
}
