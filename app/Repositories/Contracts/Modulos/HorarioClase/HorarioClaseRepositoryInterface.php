<?php

namespace App\Repositories\Contracts\Modulos\HorarioClase;

use Illuminate\Http\Request;
use App\Models\HorarioClaseModel;

interface HorarioClaseRepositoryInterface {

    /**
     * Función para crear un horario para la clase
     *
     * @param Request $request
     * @return HorarioClaseModel
     */
    public function create(Request $request): HorarioClaseModel;

    /**
     * Función para consultar si ya existe una clase con el mismo horario
     *
     * @param integer $clase_id
     * @param integer $horario
     * @return array
     */
    public function getByClassAndDate(int $clase_id, int $horario): array;
}