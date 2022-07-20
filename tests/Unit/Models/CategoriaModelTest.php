<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\CategoriaModel;
use Illuminate\Database\Eloquent\Collection;

class CategoriaModelTest extends TestCase
{
    public function test_has_many_class()
    {
        $categoriaModel = new CategoriaModel;

        $this->assertInstanceOf(Collection::class, $categoriaModel->clases);
    }
}
