<?php

namespace App\UseCases\Modulos\HorarioClase;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\UseCases\Contracts\Modulos\HorarioClases\CreateHorarioClaseInterface;
use App\Repositories\Contracts\Modulos\HorarioClase\HorarioClaseRepositoryInterface;

class CreateHorarioClaseUseCase implements CreateHorarioClaseInterface {

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
     * Función para crear un horario para la clase
     *
     * @param Request $request
     * @return array
     */
    public function handle(Request $request): array
    {
        $date = new Carbon($request->horario);

        $title = 'Ya existe la clase con el mismo horario.';
        $icon = 'info';
        $data = $this->horarioClaseRepository->getByClassAndDate(
            $request->clase_id,
            $date->getTimestamp()
        );

        if (empty($data)) {
            $title = 'Horario de la clase se guardo exitosamente.';
            $icon = 'success';
            $data[0] = $this->horarioClaseRepository->create($request);
        }

        return [
            'alert' => true,
            'icon' => $icon,
            'title' => $title,
            'limpiarFrom' => 'horarioClase',
            'data' => [
                'clase_id' => $data[0]['clase_id'],
                'horario' => $data[0]['horario'],
                'instructor' => $data[0]['instructor']
            ]
        ];
    }
}