<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AbonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonos', function (Blueprint $table) {
            $table->bigIncrements('Id_Abo');
            $table->unsignedBigInteger('Id_Rol_Usu_Emp');
            $table->unsignedBigInteger('Id_Fac');

            $table->integer('Interes');
            $table->integer('Numero_cuotas');
            $table->integer('Total_cuotas');
            $table->date('Fecha_Prog');
            $table->date('Fecha_Com');
            $table->date('Fecha_Pag');
            $table->integer('Valor');
            $table->integer('Valor_Pago');
            $table->text('Descripcion_No_Pago');
            $table->tinyInteger('Pagado');
            
            $table->timestamps();

            $table->foreign('Id_Rol_Usu_Emp')->references('Id_Rol_Usua_Emp')->on('rol_usuario_empresa');
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
        Schema::dropIfExists('abonos');
    }
}
