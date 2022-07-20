<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\SedeModel;
use Illuminate\Database\Eloquent\Collection;

class SedeModelTest extends TestCase
{
    public function test_has_many_class()
    {
        $sedeModel = new SedeModel();

        $this->assertInstanceOf(Collection::class, $sedeModel->clases);
    }
}
