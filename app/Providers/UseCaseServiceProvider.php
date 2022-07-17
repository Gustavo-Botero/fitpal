<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UseCaseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\UseCases\Contracts\Modulos\HorarioClases\CreateHorarioClaseInterface',
            'App\UseCases\Modulos\HorarioClase\CreateHorarioClaseUseCase'
        );

        $this->app->bind(
            'App\UseCases\Contracts\Modulos\HorarioClases\DestroyHorarioClaseInterface',
            'App\UseCases\Modulos\HorarioClase\DestroyHorarioClaseUseCase'
        );

        $this->app->bind(
            'App\UseCases\Contracts\Modulos\HorarioClases\UpdateHorarioClaseInterface',
            'App\UseCases\Modulos\HorarioClase\UpdateHorarioClaseUseCase'
        );

        $this->app->bind(
            'App\UseCases\Contracts\Modulos\HorarioClases\ShowHorarioClaseInterface',
            'App\UseCases\Modulos\HorarioClase\ShowHorarioClaseUseCase'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
