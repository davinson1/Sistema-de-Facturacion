<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermisosTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Usuarios
        Permission::create([
          'name' => 'Navegar ubicación',
          'slug' => 'navegar.ubicacion',
          'description' => 'El usuario puede ver el boton de ubicación',
        ]);
    }
}
