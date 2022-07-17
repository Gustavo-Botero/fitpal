<?php

namespace App\UseCases\Contracts\Modulos\HorarioClases;

interface ShowHorarioClaseInterface {

    /**
     * Función para mostrar un horario de clase
     *
     * @param integer $id
     * @return array
     */
    public function handle(int $id): array;
}