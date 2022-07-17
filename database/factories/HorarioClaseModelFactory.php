<?php

namespace Database\Factories;

use App\Models\ClaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class HorarioClaseModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'clase_id' => ClaseModel::factory()->create(),
            'horario' => Carbon::now()->getTimestamp(),
            'instructor' => $this->faker->name()
        ];
    }
}
