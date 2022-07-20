<?php

namespace App\UseCases\Modulos\HorarioClase;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\UseCases\Contracts\Modulos\HorarioClases\UpdateHorarioClaseInterface;
use App\Repositories\Contracts\Modulos\HorarioClase\HorarioClaseRepositoryInterface;

class UpdateHorarioClaseUseCase implements  UpdateHorarioClaseInterface{

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
    )
    {
        $this->horarioClaseRepository = $horarioClaseRepository;
    }

    /**
     * Función para actualiza un horario de clase
     *
     * @param Request $request
     * @param integer $id
     * @return array
     */
    public function handle(Request $request, int $id): array
    {
        $date = new Carbon($request->horario);

        $title = 'Ya existe la clase con el mismo horario.';
        $icon = 'info';
        $data = $this->horarioClaseRepository->getByClassAndDate(
            $request->clase_id,
            $date->getTimestamp()
        );

        if (empty($data)) {
            $title = 'Horario de la clase se actualizo exitosamente.';
            $icon = 'success';
            $data[0] = $this->horarioClaseRepository->update($request, $id);
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