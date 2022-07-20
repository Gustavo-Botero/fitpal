<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\TipoClaseModel;
use Illuminate\Database\Eloquent\Collection;

class TipoClaseModelTest extends TestCase
{
    public function test_has_many_class()
    {
        $tipoClase = new TipoClaseModel();

        $this->assertInstanceOf(Collection::class, $tipoClase->clases);
    }
}
