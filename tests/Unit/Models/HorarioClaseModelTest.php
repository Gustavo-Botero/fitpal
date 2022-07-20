<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\ClaseModel;
use App\Models\HorarioClaseModel;

class HorarioClaseModelTest extends TestCase
{
    public function test_belongs_to_class()
    {
        $horarioClaseModel = HorarioClaseModel::factory()->create();

        $this->assertInstanceOf(ClaseModel::class, $horarioClaseModel->clase);
    }
}
