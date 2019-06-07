<?php

namespace App\Model;

use App\Model\EntidadContactoModel;
use App\Model\EntidadHorarioModel;
use Illuminate\Database\Eloquent\Model;

class EntidadModel extends Model
{
	protected $guarded = 'id';
    protected $table = "app_entidad";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rela_rubros',
		'nombre_entidad',
		'descripcion',
		'domicilio',
		'geo',
		'notas',
		'estado',
		'version',
		'fundacion',
		'historia',
		'activo',
		'logo',
		'portada',
		'pais',
		'provincia',
		'localidad',
		'tags',
    ];

    public function horarios()
        {
            return $this
                ->hasMany(EntidadHorarioModel::class, 'rela_entidad' , 'id');
                //modelo de la tabla(categorias), id del modelo (categorias) y campo de la tabla a relacionar (rubros)
        }
    public function contactos()
        {
            return $this
                ->hasMany(EntidadContactoModel::class, 'rela_entidad' , 'id');
                //modelo de la tabla(categorias), id del modelo (categorias) y campo de la tabla a relacionar (rubros)
        }
}
