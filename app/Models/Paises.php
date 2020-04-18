<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    protected $table = 'pais';
    protected $primaryKey = 'Id_Pais';
    protected $fillable = ['Nombre'];
}
