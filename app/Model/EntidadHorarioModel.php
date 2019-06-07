<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EntidadHorarioModel extends Model
{
    protected $table = "app_entidad_horarios";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rela_entidad', 'dia', 'horario',
    ];
}
