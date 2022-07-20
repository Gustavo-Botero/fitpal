<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoClaseModel extends Model
{
    use HasFactory;

    protected $table = 'tipo_clase';

    protected $fillable = [
        'nombre'
    ];

    public function clases()
    {
        return $this->hasMany(ClaseModel::class);
    }
}
