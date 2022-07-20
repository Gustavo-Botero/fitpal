<?php

namespace App\UseCases\Modulos\HorarioClase;

use App\UseCases\Contracts\Modulos\HorarioClases\ListHorarioClaseInterface;
use App\Repositories\Contracts\Modulos\HorarioClase\HorarioClaseRepositoryInterface;

class ListHorarioClaseUseCase implements ListHorarioClaseInterface{

    protected $horarioClaseRepository;

    public function __construct(
        HorarioClaseRepositoryInterface $horarioClaseRepository
    ) {
        $this->horarioClaseRepository = $horarioClaseRepository;
    }

    public function handle(): array
    {
        $dateMin = now()->getTimestamp();
        $dateMax = now()->addDays(8)->getTimestamp();

        return $this->horarioClaseRepository->getSchedules($dateMin, $dateMax);
    }
}