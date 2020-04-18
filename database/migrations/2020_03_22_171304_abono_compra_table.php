<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AbonoCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abono_compra', function (Blueprint $table) {
            $table->bigIncrements('Id_Abo_Com');
            $table->unsignedBigInteger('Id_Rol_Usu_Emp');
            $table->unsignedBigInteger('Id_Fac');
            $table->unsignedBigInteger('Interes');

            $table->integer('Numero_Cuota');
            $table->integer('Total_Cuota');
            $table->date('Fecha_Programada');
            $table->date('Fecha_Compromiso');
            $table->date('Fecha_Pago');
            $table->integer('Valor');
            $table->integer('Valor_Pago');
            $table->text('Descripcion_No_Pago');
            $table->tinyInteger('Pagado');

            $table->timestamps();

            $table->foreign('Id_Rol_Usu_Emp')->references('Id_Rol_Usua_Emp')->on('rol_usuario_empresa');
            $table->foreign('Id_Fac')->references('Id_Fac')->on('factura');
            $table->foreign('Interes')->references('Id_Porc')->on('porcentaje');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abonos_compra');
    }
}
