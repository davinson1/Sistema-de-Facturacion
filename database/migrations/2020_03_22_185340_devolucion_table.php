<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DevolucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devolucion', function (Blueprint $table) {
            $table->bigIncrements('Id_Dev');
            $table->integer('Id_Art');
            $table->integer('Id_Fac');
            $table->integer('Id_Per_Act');
            $table->timestamp('Fecha_Devolucion')->useCurrent();
            $table->integer('Cantidad');
            $table->integer('Valor_Total');
            $table->tinyInteger('Estado_Bueno');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devolucion');
    }
}
