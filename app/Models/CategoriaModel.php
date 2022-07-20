<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoriaModel extends Model
{
    use HasFactory;

    protected $table = 'categoria';

    protected $fillable = [
        'nombre'
    ];

    public function clases()
    {
        return $this->hasMany(ClaseModel::class);
    }
}
