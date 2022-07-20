<?php

namespace App\UseCases\Contracts\Modulos\HorarioClases;

interface DestroyHorarioClaseInterface {

    /**
     * Función para eliminar un horario de clase
     *
     * @param integer $id
     * @return Array
     */
    public function handle(int $id): array;
}