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
    use RefreshDatabase;
    /**
     * Función para comprobar la creación de una clase
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

    /**
     * Función para comprobar la eliminación de un horario de clase
     */
    public function test_destroy_class_schedule()
    {
        $horarioClase = HorarioClaseModel::factory()->create();

        $response = $this->deleteJson("api/v1/horarioClase/$horarioClase->id");

        $this->assertDatabaseMissing('horario_clase', ['id' => $horarioClase->id]);

        $response->assertExactJson([
            'alert' => true,
            'icon' => 'info',
            'title' => 'El horario fue eliminado correctamente',
            'limpiarForm' => 'horarioClase'
        ]);
    }

    /**
     * Función para comprobar la actualización de un horario de clase
     */
    public function test_update_class_schedule()
    {
        $horarioClase = HorarioClaseModel::factory()->create();

        $clase = ClaseModel::factory()->create();

        $date = Carbon::now();

        $data = [
            'clase_id' => $clase->id,
            'horario' => $date->toDateTimeString(),
            'instructor' => 'Gustavo Botero'
        ];

        $response = $this->putJson("api/v1/horarioClase/$horarioClase->id", $data);

        $this->assertDatabaseHas('horario_clase', [
            'clase_id' => $data['clase_id'],
            'horario' => $date->getTimestamp(),
            'instructor' => $data['instructor']
        ]);

        $response->assertExactJson([
            'alert' => true,
            'icon' => 'success',
            'title' => 'Horario de la clase se actualizo exitosamente.',
            'limpiarFrom' => 'horarioClase',
            'data' => [
                'clase_id' => $data['clase_id'],
                'horario' => $data['horario'],
                'instructor' => $data['instructor']
            ]
        ]);
    }

    /**
     * Función para comprobar que ya existe un clase con el mismo horario antes de actualizar
     */
    public function test_update_different_class_schedule()
    {
        $horarioClase = HorarioClaseModel::factory()->create()->toArray();

        $response = $this->putJson(
            'api/v1/horarioClase/' . $horarioClase['id'],
            $horarioClase
        );

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
