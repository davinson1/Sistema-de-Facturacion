<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {
            $table->bigIncrements('Id_Comp');
            $table->unsignedBigInteger('Id_Tipo_Compra');
            $table->unsignedBigInteger('Id_Usu');
            $table->unsignedBigInteger('Id_Usu_Aut');
            $table->unsignedBigInteger('Id_For_Pag');
            
            $table->timestamp('Fecha_Compra')->useCurrent();
            $table->string('Scanner');
            $table->text('Descripcion');

            $table->timestamps();

            $table->foreign('Id_Tipo_Compra')->references('Id_Tipo_Com')->on('tipo_compra');
            $table->foreign('Id_Usu')->references('id')->on('users');
            $table->foreign('Id_Usu_Aut')->references('Id_Rol_Usua_Emp')->on('rol_usuario_empresa');
            $table->foreign('Id_For_Pag')->references('Id_For_Pag')->on('forma_pago');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compra');
    }
}
