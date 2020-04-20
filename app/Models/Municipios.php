<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    protected $table = 'municipio';
    protected $primaryKey = 'Id_Mun';
    protected $fillable = ['Nombre'];
}
