<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\UseCases\Contracts\Modulos\HorarioClases\CreateHorarioClaseInterface;
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
     * Inyección de dependencias
     *
     * @param CreateHorarioClaseInterface $createHorarioClase
     * @param DestroyHorarioClaseInterface $destroyHorarioClase
     */
    public function __construct(
        CreateHorarioClaseInterface $createHorarioClase,
        DestroyHorarioClaseInterface $destroyHorarioClase
    )
    {
        $this->createHorarioClase = $createHorarioClase;
        $this->destroyHorarioClase = $destroyHorarioClase;
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
