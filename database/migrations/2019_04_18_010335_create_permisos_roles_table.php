<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisosRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('rela_permiso');
            $table->foreign('rela_permiso', 'fk_permisosroles_permiso')->references('id')->on('permisos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('rela_roles');
            $table->foreign('rela_roles', 'fk_permisosroles_roles')->references('id')->on('roles')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permisos_roles');
    }
}
