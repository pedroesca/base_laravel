<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\ClientesModel;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(ClientesModel::class, function (Faker $faker) {
      return [
            'apellido' => $faker->lastName,
            'nombre' => $faker->firstName,
            'doc_tipo' => $faker->randomElement($array = array('DNI','LE','LC')),
            'doc_nro' => $faker->unique()->text($maxNbChars = 8),
            'fecha_nac' => $faker->text($maxNbChars = 8),
            'nacionalidad' => $faker->randomElement($array = array('ARGENTINA','PARAGUAY','BRASIL','CHILE','PERÚ','BOLIVIA')),
            'estado_civil' => $faker->randomElement($array = array('SOLTERO','CASADO','CONCUBINADO','VIUDO')),
            'condicion_iva' => $faker->randomElement($array = array('RESPONSABLE_INSCRIPTO','IVA_EXENTO','CONSUMIDOR_FINAL','MONOTRIBUTO')),
            'domi_provincia' => $faker->randomElement($array = array('FORMOSA','CORRIENTES','CHACO','MISIONES','SALTA','JUJUY')),
            'domi_localidad' => $faker->text,
            'domi_direccion' => $faker->address,
            'c_telefono' => $faker->phoneNumber,
            'c_celular' => $faker->phoneNumber,
            'c_mail' => $faker->email,
            'rela_clasificacion' => $faker->numberBetween($min = 1, $max = 50),
            'lab_ocupacion' => $faker->text,
            'lab_empleador' => $faker->name,
            'lab_seccion' => $faker->text,
            'lab_puesto' => $faker->text,
            'lab_antiguedad' => $faker->text,
            'lab_legajo' => $faker->text,
            'lab_direccion' => $faker->address,
            'lab_telefono' => $faker->phoneNumber,
            'lab_recibosueldo' => $faker->randomElement($array = array('SÍ','NO','OTROS')),
            'lab_sueldo' => $faker->randomFloat($nbMaxDecimals = 2, $min=0, $max=120000),
            'lab_otrosingresos' => $faker->randomFloat($nbMaxDecimals = 2, $min=0, $max=120000),
            'lab_notas' => $faker->text,
            'garante_nombre' => $faker->text,
            'garante_documento' => $faker->text,
            'garante_domicilio' => $faker->text,
            'garante_telefono' => $faker->text,
            'garante_mail' => $faker->email,
            'garante_ocupacion' => $faker->text,
            'garante_sueldo' => $faker->randomFloat($nbMaxDecimals = 2, $min=0, $max=120000),
            'garante_notas' => $faker->text,
            'credito_limite' => $faker->text,
            'credito_calificacion' => $faker->randomNumber(),
        ];
    
});
