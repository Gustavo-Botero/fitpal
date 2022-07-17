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

    /**
     * Función para consultar un horario de clase por id
     *
     * @param integer $id
     * @return HorarioClaseModel
     */
    public function getById(int $id): HorarioClaseModel;

    /**
     * Función para eliminar un horario de clase
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id): bool;

    /**
     * Función para actualizar un horario de clase
     *
     * @param Request $request
     * @param integer $id
     * @return HorarioClaseModel
     */
    public function update(Request $request, int $id): HorarioClaseModel;
}