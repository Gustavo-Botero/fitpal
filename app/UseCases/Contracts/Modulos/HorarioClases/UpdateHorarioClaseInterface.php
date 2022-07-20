<?php

namespace App\UseCases\Contracts\Modulos\HorarioClases;

use Illuminate\Http\Request;

interface UpdateHorarioClaseInterface {

    /**
     * Función para actualiza un horario de clase
     *
     * @param Request $request
     * @param integer $id
     * @return array
     */
    public function  handle(Request $request, int $id): array;
}