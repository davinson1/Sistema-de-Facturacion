<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ArticuloCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo_compra', function (Blueprint $table) {
            $table->bigIncrements('Id_Art_Comp');
            $table->unsignedBigInteger('Id_Art');
            $table->unsignedBigInteger('Id_Comp');
            $table->tinyInteger('Entregado');
            $table->integer('Cantidad');
            $table->text('Descripcion');

            $table->timestamps();

            $table->foreign('Id_Art')->references('Id_Art')->on('articulos');
            $table->foreign('Id_Comp')->references('Id_Comp')->on('compra');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulo_compra');
    }
}
