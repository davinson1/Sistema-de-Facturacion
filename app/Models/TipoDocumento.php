<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = 'tipo_documento';
    protected $primaryKey = 'Id_Tp_Doc';
    protected $fillable = ['Nombre'];
}
