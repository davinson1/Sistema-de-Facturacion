<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ArticulosFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos_factura', function (Blueprint $table) {
            $table->bigIncrements('Id_Art_Fac');
            $table->unsignedBigInteger('Id_Art');
            $table->unsignedBigInteger('Id_Fac');
            
            $table->tinyInteger('Entregado');
            $table->date('Fecha_Entrega');
            $table->integer('Cantidad');
            $table->tinyInteger('Por_May');

            $table->timestamps();

            $table->foreign('Id_Art')->references('Id_Art')->on('articulos');
            $table->foreign('Id_Fac')->references('Id_Fac')->on('factura');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos_factura');
    }
}
