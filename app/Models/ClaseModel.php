<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClaseModel extends Model
{
    use HasFactory;

    protected $table = 'clase';

    protected $fillable = [
        'nombre',
        'sede_id',
        'tipo_clase_id',
        'categoria_id'
    ];

    public function horariosClases()
    {
        return $this->hasMany(HorarioClaseModel::class);
    }

    public function categoria()
    {
        return $this->belongsTo(CategoriaModel::class);
    }

    public function sede()
    {
        return $this->belongsTo(SedeModel::class);
    }

    public function tipoClase()
    {
        return $this->belongsTo(TipoClaseModel::class);
    }
}
