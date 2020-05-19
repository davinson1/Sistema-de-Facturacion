<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_ciudad');
            
            $table->string('nit');
            $table->string('nombre_proveedor');
            $table->string('nombre_representante');
            $table->string('telefono');
            $table->text('direccion');
            $table->string('tipo_cuenta');
            $table->string('numero_cuenta');
            $table->string('cuenta_banco');
            $table->text('observaciones');

            $table->timestamps();

            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_ciudad')->references('id')->on('municipio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedor');
    }
}
