<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
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
     * Inyección de dependencias
     *
     * @param CreateHorarioClaseInterface $createHorarioClase
     * @param DestroyHorarioClaseInterface $destroyHorarioClase
     * @param UpdateHorarioClaseInterface $updateHorarioClase
     * @param ShowHorarioClaseInterface $showHorarioClase
     */
    public function __construct(
        CreateHorarioClaseInterface $createHorarioClase,
        DestroyHorarioClaseInterface $destroyHorarioClase,
        UpdateHorarioClaseInterface $updateHorarioClase,
        ShowHorarioClaseInterface $showHorarioClase
    )
    {
        $this->createHorarioClase = $createHorarioClase;
        $this->destroyHorarioClase = $destroyHorarioClase;
        $this->updateHorarioClase = $updateHorarioClase;
        $this->showHorarioClase = $showHorarioClase;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Función para crear un horario para la clase
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
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
     * @param Request $request
     * @param integer $id
     * @return Response
     */
    public function update(Request $request, int $id): Response
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
