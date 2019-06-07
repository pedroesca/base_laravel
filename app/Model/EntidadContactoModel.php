<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EntidadContactoModel extends Model
{
    protected $table = "app_entidad_contacto";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rela_entidad', 'tipo', 'valor',
    ];
}
