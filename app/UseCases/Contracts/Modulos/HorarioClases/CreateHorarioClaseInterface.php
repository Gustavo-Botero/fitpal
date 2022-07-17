<?php

namespace App\UseCases\Contracts\Modulos\HorarioClases;

use Illuminate\Http\Request;

interface CreateHorarioClaseInterface {

    /**
     * Función para crear un horario para la clase
     *
     * @param Request $request
     * @return array
     */
    public function handle(Request $request): array;
}