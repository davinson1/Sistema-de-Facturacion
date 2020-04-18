<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RolUsuarioEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol_usuario_empresa', function (Blueprint $table) {
            $table->bigIncrements('Id_Rol_Usua_Emp');
            $table->unsignedBigInteger('Id_Rol');
            $table->unsignedBigInteger('Id_Cargo');
            $table->unsignedBigInteger('Id_Emp');
            $table->unsignedBigInteger('Id_Usuario');
            $table->timestamp('Fecha_Creacion')->useCurrent();
            $table->timestamps();

            $table->foreign('Id_Rol')->references('Id_Rol')->on('rol');
            $table->foreign('Id_Cargo')->references('Id_Cargo')->on('cargo');
            $table->foreign('Id_Emp')->references('Id_Emp')->on('empresa');
            $table->foreign('Id_Usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('rol_usuario_empresa');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
