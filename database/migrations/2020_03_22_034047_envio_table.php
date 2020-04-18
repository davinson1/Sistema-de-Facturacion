<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EnvioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envio', function (Blueprint $table) {
            $table->bigIncrements('Id_Envio');
            $table->unsignedBigInteger('Id_Persona_Trans');
            $table->unsignedBigInteger('Id_Fac');

            $table->tinyInteger('Entregado');
            $table->date('Fecha_Envio');
            $table->date('Fecha_Pro');
            $table->text('Direccion');
            $table->timestamps();

            $table->foreign('Id_Persona_Trans')->references('id')->on('users');
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
        Schema::dropIfExists('envio');
    }
}
