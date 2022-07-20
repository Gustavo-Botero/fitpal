<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\HorarioClaseRequest;
use App\UseCases\Contracts\Modulos\HorarioClases\ListHorarioClaseInterface;
use App\UseCases\Contracts\Modulos\HorarioClases\ShowHorarioClaseInterface;
use App\UseCases\Contracts\Modulos\HorarioClases\CreateHorarioClaseInterface;
use App\UseCases\Contracts\Modulos\HorarioClases\UpdateHorarioClaseInterface;
use App\UseCases\Contracts\Modulos\HorarioClases\DestroyHorarioClaseInterface;

class HorarioClaseController extends Controller
{
    /**
     * Implementación de CreateHorarioClaseInterface
     *
     * @var CreateHorarioClaseInterface
     */
    protected $createHorarioClase;

    /**
     * Implementación de DestroyHorarioClaseInterface
     *
     * @var DestroyHorarioClaseInterface
     */
    protected $destroyHorarioClase;

    /**
     * Implementación de UpdateHorarioClaseInterface
     *
     * @var UpdateHorarioClaseInterface
     */
    protected $updateHorarioClase;

    /**
     * Implementación de ShowHorarioClaseInterface
     *
     * @var ShowHorarioClaseInterface
     */
    protected $showHorarioClase;

    /**
     * Implementación de ListHorarioClaseInterface
     *
     * @var ListHorarioClaseInterface
     */
    protected $listHorarioClase;

    /**
     * Inyección de dependencias
     *
     * @param CreateHorarioClaseInterface $createHorarioClase
     * @param DestroyHorarioClaseInterface $destroyHorarioClase
     * @param UpdateHorarioClaseInterface $updateHorarioClase
     * @param ShowHorarioClaseInterface $showHorarioClase
     * @param ListHorarioClaseInterface $listHorarioClase
     */
    public function __construct(
        CreateHorarioClaseInterface $createHorarioClase,
        DestroyHorarioClaseInterface $destroyHorarioClase,
        UpdateHorarioClaseInterface $updateHorarioClase,
        ShowHorarioClaseInterface $showHorarioClase,
        ListHorarioClaseInterface $listHorarioClase
    ) {
        $this->createHorarioClase = $createHorarioClase;
        $this->destroyHorarioClase = $destroyHorarioClase;
        $this->updateHorarioClase = $updateHorarioClase;
        $this->showHorarioClase = $showHorarioClase;
        $this->listHorarioClase = $listHorarioClase;
    }

    /**
     * Función para consultar las clases que estén
     * disponibles máximo en 8 días
     *
     * @return Response
     */
    public function index(): Response
    {
        return response(
            $this->listHorarioClase->handle(),
            200
        );
    }

    /**
     * Función para crear un horario para la clase
     *
     * @param HorarioClaseRequest $request
     * @return Response
     */
    public function store(HorarioClaseRequest $request): Response
    {
        return response(
            $this->createHorarioClase->handle($request),
            200
        );
    }

    /**
     * Función para mostrar un horario de clase
     *
     * @param integer $id
     * @return Response
     */
    public function show(int $id): Response
    {
        return response(
            $this->showHorarioClase->handle($id),
            200
        );
    }

    /**
     * Función para actualizar un horario de clase
     *
     * @param HorarioClaseRequest $request
     * @param integer $id
     * @return Response
     */
    public function update(HorarioClaseRequest $request, int $id): Response
    {
        return response(
            $this->updateHorarioClase->handle($request, $id),
            200
        );
    }

    /**
     * Función para eliminar un horario de clase
     *
     * @param integer $id
     * @return Response
     */
    public function destroy(int $id): Response
    {
        return response(
            $this->destroyHorarioClase->handle($id),
            200
        );
    }
}
