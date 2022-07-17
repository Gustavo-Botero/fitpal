<?php

namespace Tests\Feature\Http\Controllers\Api\V1;

use Carbon\Carbon;
use Tests\TestCase;
use App\Models\ClaseModel;
use App\Models\HorarioClaseModel;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HorarioClaseControllerTest extends TestCase
{
    /**
     * Función para comprobar la creación de una clase
     *
     * @return void
     */
    public function test_store_class_schedule()
    {
        $this->withoutExceptionHandling();

        $clase = ClaseModel::factory()->create();

        $date = Carbon::now();

        $data = [
            'clase_id' => $clase->id,
            'horario' => $date->toDateTimeString(),
            'instructor' => 'Gustavo Botero'
        ];

        $response = $this->postJson('api/v1/horarioClase', $data);

        $this->assertDatabaseHas('horario_clase', [
            'clase_id' => $data['clase_id'],
            'horario' => $date->getTimestamp(),
            'instructor' => $data['instructor']
        ]);

        $response->assertExactJson([
            'alert' => true,
            'icon' => 'success',
            'title' => 'Horario de la clase se guardo exitosamente.',
            'limpiarFrom' => 'horarioClase',
            'data' => [
                'clase_id' => $data['clase_id'],
                'horario' => $data['horario'],
                'instructor' => $data['instructor']
            ]
        ]);

    }

    /**
     * Función para comprobar que ya existe un clase con el mismo horario
     *
     * @return void
     */
    public function test_store_different_class_schedule()
    {
        $this->withoutExceptionHandling();

        $horarioClase = HorarioClaseModel::factory()->create()->toArray();

        $response = $this->postJson('api/v1/horarioClase', $horarioClase);

        $response->assertJson([
            'alert' => true,
            'icon' => 'info',
            'title' => 'Ya existe la clase con el mismo horario.',
            'limpiarFrom' => 'horarioClase',
            'data' => [
                'clase_id' => $horarioClase['clase_id'],
                'horario' => $horarioClase['horario'],
                'instructor' => $horarioClase['instructor']
            ]
        ]);
    }
}
