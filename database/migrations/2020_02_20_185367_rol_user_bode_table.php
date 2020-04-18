<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RolUserBodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol_user_bode', function (Blueprint $table) {
            $table->bigIncrements('Id_rol_user_bode');
            $table->unsignedBigInteger('Id_Usu');
            $table->unsignedBigInteger('Id_Rol');
            $table->unsignedBigInteger('Id_Bod');
            $table->unsignedBigInteger('Id_Cargo');
            
            $table->tinyInteger('Activo');
            
            $table->timestamps();

            $table->foreign('Id_Usu')->references('id')->on('users');
            $table->foreign('Id_Rol')->references('Id_Rol')->on('rol');
            $table->foreign('Id_Bod')->references('Id_Bodega')->on('bodega');
            $table->foreign('Id_Cargo')->references('Id_Cargo')->on('cargo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rol_user_bode');
    }
}
