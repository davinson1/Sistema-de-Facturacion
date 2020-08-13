<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra_temporal extends Model
{
    protected $table = 'compra_temporal';
    // protected $primaryKey = 'Id_Depar'; //por si la llave primaria tiene otro nombre
    protected $fillable = ['token_usuario','nombre_producto','foto','id_producto','codigo_barras','descripcion_producto'];

}
