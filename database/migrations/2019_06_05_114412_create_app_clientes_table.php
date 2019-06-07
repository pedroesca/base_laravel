<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use phpDocumentor\Reflection\Types\Nullable;

class CreateAppClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('apellido');
            $table->string('nombre');
            $table->string('doc_tipo')->default('DNI');
            $table->string('doc_nro');
            $table->string('fecha_nac')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('condicion_iva')->nullable();
            $table->string('domi_provincia')->nullable();
            $table->string('domi_localidad')->nullable();
            $table->string('domi_direccion')->nullable();
            $table->string('c_telefono')->nullable();
            $table->string('c_celular')->nullable();
            $table->string('c_mail')->nullable();
            $table->unsignedBigInteger('rela_clasificacion')->default(0);
            $table->string('lab_ocupacion')->nullable();
            $table->string('lab_empleador')->nullable();
            $table->string('lab_seccion')->nullable();
            $table->string('lab_puesto')->nullable();
            $table->string('lab_antiguedad')->nullable();
            $table->string('lab_legajo')->nullable();
            $table->string('lab_direccion')->nullable();
            $table->string('lab_telefono')->nullable();
            $table->string('lab_recibosueldo')->nullable();
            $table->double('lab_sueldo',8,2)->nullable();
            $table->double('lab_otrosingresos',8,2)->nullable();
            $table->string('lab_notas')->nullable();
            $table->string('garante_nombre')->nullable();
            $table->string('garante_documento')->nullable();
            $table->string('garante_domicilio')->nullable();
            $table->string('garante_telefono')->nullable();
            $table->string('garante_mail')->nullable();
            $table->string('garante_ocupacion')->nullable();
            $table->double('garante_sueldo',8,2)->nullable();
            $table->string('garante_notas')->nullable();
            $table->string('credito_limite')->nullable();
            $table->integer('credito_calificacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_clientes');
    }
}
