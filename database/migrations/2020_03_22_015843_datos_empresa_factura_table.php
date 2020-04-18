<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DatosEmpresaFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_empresa_factura', function (Blueprint $table) {
            $table->bigIncrements('Id_Dac_Emp_Fac');
            $table->text('Nombre');
            $table->text('Nit');
            $table->text('Regimen');
            $table->text('Reso_Dian');
            $table->text('Representacion_Legal');
            $table->text('Direccion');
            $table->text('Telefono');
            $table->text('Ciudad');
            $table->text('Ofrece');
            $table->text('Nombre_Empresa_2');
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
        Schema::dropIfExists('datos_empresa_factura');
    }
}
