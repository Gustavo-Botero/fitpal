<?php

namespace Database\Factories;

use App\Models\ClaseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class HorarioClaseModelFactory extends Factory
{
    public function definition()
    {
        $limInferior = now()->getTimestamp();
        $limSuperior = now()->addYear(1)->getTimestamp();

        return [
            'clase_id' => ClaseModel::factory()->create(),
            'horario' => mt_rand($limInferior, $limSuperior),
            'instructor' => $this->faker->name()
        ];
    }
}
