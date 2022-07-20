<?php

namespace App\UseCases\Contracts\Modulos\HorarioClases;

interface ListHorarioClaseInterface {

    /**
     * Función para consultar las clases que estén
     * disponibles máximo en 8 días
     *
     * @return array
     */
    public function handle(): array;
}