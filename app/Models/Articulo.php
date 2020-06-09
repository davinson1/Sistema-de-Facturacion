<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
  protected $table = 'articulos';
  // protected $primaryKey = 'Id_Articulo'; //por si la llave primaria tiene otro nombre
  protected $fillable = ['id_producto', 'id_tipo_articulo', 'id_proveedor', 'valor_compra', 'valor_envio', 'porcentaje_minimo', 'id_porcentaje', 'codigo_barras', 'foto', 'created_at', 'updated_at'];
}
