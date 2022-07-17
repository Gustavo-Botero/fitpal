<?php

namespace App\Repositories\Modulos\HorarioClase;

use Illuminate\Http\Request;
use App\Models\HorarioClaseModel;
use App\Repositories\Contracts\Modulos\HorarioClase\HorarioClaseRepositoryInterface;

class HorarioClaseRepository implements HorarioClaseRepositoryInterface {

    /**
     * Implementación de HorarioClaseModel
     *
     * @var HorarioClaseModel
     */
    protected $horarioClase;

    /**
     * Inyección de dependencias
     *
     * @param HorarioClaseModel $horarioClase
     */
    public function __construct(
        HorarioClaseModel $horarioClase
    )
    {
        $this->horarioClase = $horarioClase;
    }

    /**
     * Función para crear un horario para la clase
     *
     * @param Request $request
     * @return HorarioClaseModel
     */
    public function create(Request $request): HorarioClaseModel
    {
        $horarioClase = new $this->horarioClase;
        $horarioClase->clase_id = $request->clase_id;
        $horarioClase->horario = $request->horario;
        $horarioClase->instructor = $request->instructor;
        $horarioClase->save();

        return $horarioClase;
    }

    /**
     * Función para consultar si ya existe una clase con el mismo horario
     *
     * @param integer $clase_id
     * @param integer $horario
     * @return array
     */
    public function getByClassAndDate(int $clase_id, int $horario): array
    {
        return $this->horarioClase->where([
            'clase_id' => $clase_id,
            'horario' => $horario
        ])->get()->toArray();
    }
}