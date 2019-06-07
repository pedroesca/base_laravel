<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoriasModel extends Model
{
    protected $table = "app_categorias_familia";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'descripcion',
    ];
}
