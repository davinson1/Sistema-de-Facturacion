<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DocumentoFirmadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento_firmado', function (Blueprint $table) {
            $table->bigIncrements('Id_Doc_Fir');
            $table->unsignedBigInteger('Id_Usu');
            $table->unsignedBigInteger('Id_Fac');
            $table->timestamp('Fecha_Creacion')->useCurrent();
            $table->text('Descripcion');
            $table->timestamps();

            $table->foreign('Id_Usu')->references('id')->on('users');
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
        Schema::dropIfExists('documento_firmado');
    }
}
