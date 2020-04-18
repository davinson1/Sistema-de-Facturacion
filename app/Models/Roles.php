<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'rol';
    protected $primaryKey = 'Id_Rol';
    protected $fillable = ['Nombre'];
}
