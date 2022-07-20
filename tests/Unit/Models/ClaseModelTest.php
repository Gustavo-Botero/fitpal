<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\SedeModel;
use App\Models\ClaseModel;
use App\Models\CategoriaModel;
use App\Models\TipoClaseModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClaseModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_has_many_class_schedules()
    {
        $claseModel = new ClaseModel();

        $this->assertInstanceOf(Collection::class, $claseModel->horariosClases);
    }

    public function test_belongs_to_category()
    {
        $claseModel = ClaseModel::factory()->create();

        $this->assertInstanceOf(CategoriaModel::class, $claseModel->categoria);
    }

    public function test_belongs_to_sede()
    {
        $claseModel = ClaseModel::factory()->create();

        $this->assertInstanceOf(SedeModel::class, $claseModel->sede);
    }

    public function test_belongs_to_class_type()
    {
        $claseModel = ClaseModel::factory()->create();

        $this->assertInstanceOf(TipoClaseModel::class, $claseModel->tipoClase);
    }
}
