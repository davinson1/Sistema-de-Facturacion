<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DescuentoTransporteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descuento_transporte', function (Blueprint $table) {
            $table->bigIncrements('Id_Desc_Trans');
            $table->integer('Id_Aut');
            $table->integer('Id_Env');
            $table->integer('Id_Rec');

            $table->timestamp('Fecha_Envio')->useCurrent();
            $table->tinyInteger('Buen_Estado');
            $table->text('Descripcion');
            $table->string('Scanner');
            
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
        Schema::dropIfExists('descuento_transporte');
    }
}
