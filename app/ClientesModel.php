<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientesModel extends Model
{
    //
    protected $table = "app_clientes";
    protected $guarded = 'id';
    protected $fillable = [
        'apellido','nombre','doc_tipo','doc_nro','fecha_nac','nacionalidad','estado_civil','condicion_iva','domi_provincia','domi_localidad','domi_direccion','c_telefono','c_celular','c_mail','rela_clasificacion','lab_ocupacion','lab_empleador','lab_seccion','lab_puesto','lab_antiguedad','lab_legajo','lab_direccion','lab_telefono','lab_recibosueldo','lab_sueldo','lab_otrosingresos','lab_notas','garante_nombre','garante_documento','garante_domicilio','garante_telefono','garante_mail','garante_ocupacion','garante_sueldo','garante_notas','credito_limite','credito_calificacion',
    ];

}
