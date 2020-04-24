<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    protected $table = 'municipio';
    protected $primaryKey = 'Id_Mun';
    protected $fillable = ['Nombre'];

    public function departamentos()
    {
      // return $this->hasOne('App\Models\Departamentos', 'Id_Depar');      
      return $this->belongsTo(Departamentos::class, 'Id_Depar');      
    }
}
