<?php

namespace App\UseCases\Modulos\HorarioClase;

use App\UseCases\Contracts\Modulos\HorarioClases\ShowHorarioClaseInterface;
use App\Repositories\Contracts\Modulos\HorarioClase\HorarioClaseRepositoryInterface;

class ShowHorarioClaseUseCase implements ShowHorarioClaseInterface {

    /**
     * Implementación de HorarioClaseRepositoryInterface
     *
     * @var HorarioClaseRepositoryInterface
     */
    protected $horarioClaseRepository;

    /**
     * Inyección de dependencias
     *
     * @param HorarioClaseRepositoryInterface $horarioClaseRepository
     */
    public function __construct(
        HorarioClaseRepositoryInterface $horarioClaseRepository
    ) {
        $this->horarioClaseRepository = $horarioClaseRepository;
    }

    /**
     * Función para mostrar un horario de clase
     *
     * @param integer $id
     * @return array
     */
    public function handle(int $id): array
    {
        $horarioClase = $this->horarioClaseRepository->getById($id);

        return [
            'data' => [
                'clase_id' => $horarioClase['clase_id'],
                'horario' => $horarioClase['horario'],
                'instructor' => $horarioClase['instructor']
            ]
        ];
    }
}