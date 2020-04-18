<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BodegaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bodega', function (Blueprint $table) {
            $table->bigIncrements('Id_Bodega');
            $table->unsignedBigInteger('Id_Ciudad');
            $table->unsignedBigInteger('Id_Rol_Usua_Emp');

            $table->text('Nombre');
            $table->text('Direccion');
            $table->text('Celular');

            $table->timestamps();

            $table->foreign('Id_Ciudad')->references('Id_Mun')->on('municipio');
            $table->foreign('Id_Rol_Usua_Emp')->references('Id_Rol_Usua_Emp')->on('Rol_Usuario_Empresa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bodega');
    }
}
