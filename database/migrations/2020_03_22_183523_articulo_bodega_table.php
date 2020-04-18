<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ArticuloBodegaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo_bodega', function (Blueprint $table) {
            $table->bigIncrements('Id_Art_bod');
            $table->unsignedBigInteger('Id_Art');
            $table->unsignedBigInteger('Id_Bod');

            $table->timestamp('Fecha_ingreso')->useCurrent();
            $table->date('Fecha_Vencimiento');
            $table->integer('Cantidad');
            
            $table->timestamps();

            $table->foreign('Id_Art')->references('Id_Art')->on('articulos');
            $table->foreign('Id_Bod')->references('Id_Bodega')->on('bodega');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulo_bodega');
    }
}
