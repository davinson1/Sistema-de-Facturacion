<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->bigIncrements('Id_Art');
            $table->unsignedBigInteger('Id_Rol_Usua_Emp');
            $table->unsignedBigInteger('Id_Prod');
            $table->unsignedBigInteger('Id_Tipo');
            
            $table->integer('Valor_Compra');
            $table->integer('Valor_Envio');
            $table->integer('Id_Porcentaje_Min');
            $table->integer('Id_Porcentaje');
            $table->integer('Codigo_Barras');

            $table->timestamps();

            $table->foreign('Id_Rol_Usua_Emp')->references('Id_Rol_Usua_Emp')->on('rol_usuario_empresa');
            $table->foreign('Id_Prod')->references('Id_Prod')->on('productos');
            $table->foreign('Id_Tipo')->references('Id_Tipo_Art')->on('tipo_articulo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}
