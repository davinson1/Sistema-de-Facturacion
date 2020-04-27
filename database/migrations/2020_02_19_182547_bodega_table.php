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
        $table->bigIncrements('id');
        $table->unsignedBigInteger('id_ciudad');

        $table->text('nombre');
        $table->text('direccion');
        $table->text('celular');

        $table->timestamps();

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
        Schema::dropIfExists('bodega');
    }
}
