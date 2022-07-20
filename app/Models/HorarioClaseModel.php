<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HorarioClaseModel extends Model
{
    use HasFactory;

    protected $table = 'horario_clase';

    protected $fillable = [
        'clase_id',
        'horario',
        'instructor'
    ];

    public function setHorarioAttribute($value)
    {
        $date = new Carbon($value);

        $this->attributes['horario'] = $date->getTimestamp();
    }

    public function getHorarioAttribute()
    {
        $date = new Carbon($this->attributes['horario']);

        return $date->toDateTimeString();
    }

    public function clase()
    {
        return $this->belongsTo(ClaseModel::class);
    }

}
