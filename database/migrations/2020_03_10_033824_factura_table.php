<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura', function (Blueprint $table) {
            $table->bigIncrements('Id_Fac');
            $table->unsignedBigInteger('Id_Usu');
            //$table->unsignedBigInteger('Id_Cli');
            $table->unsignedBigInteger('Id_Iva');
            $table->unsignedBigInteger('Id_For_Pag');
            $table->unsignedBigInteger('Id_Tip_Fac');

            $table->integer('Cod_Fac');
            $table->timestamp('Fecha_Creacion')->useCurrent();
            $table->date('Fecha_Anulacion');
            $table->tinyInteger('Anulado');
            $table->tinyInteger('Devolucion_producto');
            $table->date('Fecha_Devolucion');
            $table->integer('Valor_Iva');
            $table->integer('Valor_Devolucion');
            $table->integer('Valor_Total');
            $table->tinyInteger('Iva');

            $table->timestamps();


           // $table->foreign('Id_Cli')->references('Id_Rol_Usua_Emp')->on('rol_usuario_empresa');
        $table->foreign('Id_Iva')->references('Id_Iva')->on('iva');
        $table->foreign('Id_For_Pag')->references('Id_For_Pag')->on('forma_pago');
        $table->foreign('Id_Tip_Fac')->references('Id_Tipo_Fac')->on('tipo_factura');
        $table->foreign('Id_Usu')->references('Id_Rol_Usua_Emp')->on('rol_usuario_empresa');
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
             Schema::dropIfExists('factura');
             DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
