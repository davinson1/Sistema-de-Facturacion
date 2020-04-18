<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PorcentajeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('porcentaje', function (Blueprint $table) {
            $table->bigIncrements('Id_Porc');
            $table->text('Nombre');
            $table->text('Descripcion');
            $table->integer('Porcentaje');
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
           DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('porcentaje');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
