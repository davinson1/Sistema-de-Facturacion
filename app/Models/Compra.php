<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
  protected $table = 'compra';
  // protected $primaryKey = 'Id_Compra'; //por si la llave primaria tiene otro nombre
  protected $fillable = ['id_tipo_compra', 'id_usuario', 'id_forma_pago', 'scanner', 'descripcion', 'created_at', 'updated_at'];

  public function tipoCompra() {
      return $this->belongsTo(TipoCompra::class, 'id_tipo_compra');
    }
}
