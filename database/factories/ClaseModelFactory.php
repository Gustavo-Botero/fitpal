<?php

namespace Database\Factories;

use App\Models\SedeModel;
use App\Models\CategoriaModel;
use App\Models\TipoClaseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClaseModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'sede_id' => SedeModel::factory()->create(),
            'tipo_clase_id' => TipoClaseModel::factory()->create(),
            'categoria_id' => CategoriaModel::factory()->create()
        ];
    }
}
