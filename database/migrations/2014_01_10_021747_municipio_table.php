<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MunicipioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipio', function (Blueprint $table) {
            $table->bigIncrements('Id_Mun');
            $table->unsignedBigInteger('Id_Depar');
            $table->text('Nombre');
            $table->timestamps();

            $table->foreign('Id_Depar')->references('Id_Depar')->on('departamento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('municipio');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
