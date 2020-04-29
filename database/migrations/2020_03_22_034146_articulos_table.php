<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('articulos', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('id_producto');
        $table->unsignedBigInteger('id_tipo');
        
        $table->integer('valor_compra');
        $table->integer('valor_envio');
        $table->integer('id_porcentaje_Min');
        $table->integer('id_porcentaje');
        $table->integer('codigo_barras');

        $table->timestamps();
        $table->foreign('id_producto')->references('id')->on('productos');
        $table->foreign('id_tipo')->references('id')->on('tipo_articulo');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}
