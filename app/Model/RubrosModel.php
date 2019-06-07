<?php

namespace App\Model;

use App\Model\CategoriasModel;
use Illuminate\Database\Eloquent\Model;

class RubrosModel extends Model
{
    protected $table = "app_categorias_rubros";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre_rubro',
        'descripcion',
        'rela_categoria_familia',
    ];

    public function categorias()
        {
            return $this
                ->hasMany(CategoriasModel::class, 'id' , 'rela_categoria_familia');
                //modelo de la tabla(categorias), id del modelo (categorias) y campo de la tabla a relacionar (rubros)
        }
}
