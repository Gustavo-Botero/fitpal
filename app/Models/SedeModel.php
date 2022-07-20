<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SedeModel extends Model
{
    use HasFactory;

    protected $table = 'sede';

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono'
    ];

    public function clases()
    {
        return $this->hasMany(ClaseModel::class);
    }
}
