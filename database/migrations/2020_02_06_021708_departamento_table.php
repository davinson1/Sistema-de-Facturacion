<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DepartamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamento', function (Blueprint $table) {
            $table->bigIncrements('Id_Depar');
            $table->unsignedBigInteger('Id_Pais');
            $table->text('Nombre');
            $table->timestamps();

            $table->foreign('Id_Pais')->references('Id_Pais')->on('pais');
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
        Schema::dropIfExists('departamento');
         DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
