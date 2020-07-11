<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
  protected $table = 'productos';
  // protected $primaryKey = 'Id_Articulo'; //por si la llave primaria tiene otro nombre
  protected $fillable = ['id_tipo_articulo', 'id_proveedor', 'valor_compra', 'valor_envio', 'porcentaje_minimo', 'id_porcentaje', 'nombre', 'especificaciones', 'codigo_barras', 'foto', 'created_at', 'updated_at'];
}
