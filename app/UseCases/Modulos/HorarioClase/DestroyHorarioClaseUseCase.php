<?php

namespace App\UseCases\Modulos\HorarioClase;

use App\UseCases\Contracts\Modulos\HorarioClases\DestroyHorarioClaseInterface;
use App\Repositories\Contracts\Modulos\HorarioClase\HorarioClaseRepositoryInterface;

class DestroyHorarioClaseUseCase implements DestroyHorarioClaseInterface {

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
     * Función para eliminar un horario de clase
     *
     * @param integer $id
     * @return array
     */
    public function handle(int $id): array
    {
        $this->horarioClaseRepository->delete($id);

        return [
            'alert' => true,
            'icon' => 'info',
            'title' => 'El horario fue eliminado correctamente',
            'limpiarForm' => 'horarioClase'
        ];
    }
}