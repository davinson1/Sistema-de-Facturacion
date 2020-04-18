<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TrasladoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traslado', function (Blueprint $table) {
            $table->bigIncrements('Id_Tras');
            $table->unsignedBigInteger('Id_Prod');
            $table->unsignedBigInteger('Id_Rol_Usua_Emp');
            $table->unsignedBigInteger('Id_Bod_Sal');
            $table->unsignedBigInteger('Id_Bod_Entr');
            $table->unsignedBigInteger('Id_Desc_tras');
            
            $table->integer('Cantidad');
            $table->timestamp('Fecha_traslado')->useCurrent();
            $table->timestamps();

            $table->foreign('Id_Prod')->references('Id_Prod')->on('productos');
            $table->foreign('Id_Rol_Usua_Emp')->references('Id_Rol_Usua_Emp')->on('Rol_Usuario_Empresa');
            $table->foreign('Id_Bod_Sal')->references('Id_Bodega')->on('bodega');
            $table->foreign('Id_Bod_Entr')->references('Id_Bodega')->on('bodega');
            $table->foreign('Id_Desc_tras')->references('Id_Desc_Trans')->on('descuento_transporte');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('traslado');
    }
}
