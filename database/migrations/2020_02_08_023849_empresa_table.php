<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table->bigIncrements('Id_Emp');
            $table->unsignedBigInteger('Id_Tp_Tri');
            $table->unsignedBigInteger('Id_Mun');
            $table->text('Nombre');
            $table->integer('Numero');
            $table->text('Direccion');
            $table->text('Telefono');
            $table->text('Celular');
            $table->text('Descripcion');
            $table->text('Nombre_jefe');
            $table->text('Celular_jefe');
            $table->tinyInteger('Activo');
            $table->date('Creacion');
            $table->timestamp('Fecha_Creacion')->useCurrent();
            $table->timestamps();

            $table->foreign('Id_Tp_Tri')->references('Id_Tp_Tri')->on('tipo_tributario');
            $table->foreign('Id_Mun')->references('Id_Mun')->on('municipio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa');
    }
}
