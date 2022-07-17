<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\UseCases\Contracts\Modulos\HorarioClases\CreateHorarioClaseInterface;

class HorarioClaseController extends Controller
{
    /**
     * Implementación de CreateHorarioClaseInterface
     *
     * @var CreateHorarioClaseInterface
     */
    protected $horarioClase;

    /**
     * Inyección de dependencias
     *
     * @param CreateHorarioClaseInterface $horarioClase
     */
    public function __construct(
        CreateHorarioClaseInterface $horarioClase
    )
    {
        $this->horarioClase = $horarioClase;
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
            $this->horarioClase->handle($request),
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
