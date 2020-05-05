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
      // Permisos de usuarios
        Permission::create([
          'name' => 'Navegar usuario',
          'categoria' => 'usuario',
          'slug' => 'navegar.usuario',
          'description' => 'El usuario puede ver en el menú el enlace usuarios.',
        ]);
        Permission::create([
          'name' => 'Crear usuario',
          'categoria' => 'usuario',
          'slug' => 'crear.usuario',
          'description' => 'El usuario puede ver el boton de crear usuarios.',
        ]);
        Permission::create([
          'name' => 'Editar usuario',
          'categoria' => 'usuario',
          'slug' => 'editar.usuario',
          'description' => 'El usuario puede ver el boton de editar usuarios.',
        ]);
        Permission::create([
          'name' => 'Eliminar usuario',
          'categoria' => 'usuario',
          'slug' => 'eliminar.usuario',
          'description' => 'El usuario puede ver el boton de eliminar usuarios.',
        ]);

        // Permisos de roles
          Permission::create([
            'name' => 'Navegar roles',
            'categoria' => 'usuario',
            'slug' => 'navegar.rol',
            'description' => 'Lista y navega todos los roles del sistemas.',
          ]);
          Permission::create([
            'name' => 'Crear de roles',
            'categoria' => 'usuario',
            'slug' => 'crear.rol',
            'description' => 'Crear cualquier rol.',
          ]);
          Permission::create([
            'name' => 'Edición de roles',
            'categoria' => 'usuario',
            'slug' => 'editar.rol',
            'description' => 'Editar cualquier rol.',
          ]);
          Permission::create([
            'name' => 'Eliminar rol',
            'categoria' => 'usuario',
            'slug' => 'eliminar.rol',
            'description' => 'Eliminar cualquier rol.',
          ]);

        // Permisos de tipo de documento
          Permission::create([
            'name' => 'Navegar tipo de documento',
            'categoria' => 'usuario',
            'slug' => 'navegar.tipo.documento',
            'description' => 'Lista y navega todos los tipo de documento del sistemas.',
          ]);
          Permission::create([
            'name' => 'Crear de tipo de documento',
            'categoria' => 'usuario',
            'slug' => 'crear.tipo.documento',
            'description' => 'Crear cualquier tipo de documento.',
          ]);
          Permission::create([
            'name' => 'Edición de tipo de documento',
            'categoria' => 'usuario',
            'slug' => 'editar.tipo.documento',
            'description' => 'Editar cualquier tipo de documento.',
          ]);
          Permission::create([
            'name' => 'Eliminar tipo de documento',
            'categoria' => 'usuario',
            'slug' => 'eliminar.tipo.documento',
            'description' => 'Eliminar cualquier tipo de documento.',
          ]);

      // Permisos de ubicacion
        Permission::create([
         'name' => 'Navegar ubicación',
         'categoria' => 'ubicacion',
          'slug' => 'navegar.ubicacion',
          'description' => 'El usuario puede ver en el menú el enlace ubicación.',
        ]);
        // Permisos de país
          Permission::create([
            'name' => 'Navegar país',
            'categoria' => 'ubicacion',
            'slug' => 'navegar.pais',
            'description' => 'El usuario puede ver en el menú el enlace país.',
          ]);
          Permission::create([
            'name' => 'Crear país',
            'categoria' => 'ubicacion',
            'slug' => 'crear.pais',
            'description' => 'El usuario puede ver el boton de crear país.',
          ]);
          Permission::create([
            'name' => 'Editar país',
            'categoria' => 'ubicacion',
            'slug' => 'editar.pais',
            'description' => 'El usuario puede ver el boton de editar país.',
          ]);
          Permission::create([
            'name' => 'Eliminar país',
            'categoria' => 'ubicacion',
            'slug' => 'eliminar.pais',
            'description' => 'El usuario puede ver el boton de eliminar país.',
          ]);
        // Permisos de departamento
          Permission::create([
            'name' => 'Navegar departamento',
            'categoria' => 'ubicacion',
            'slug' => 'navegar.departamento',
            'description' => 'El usuario puede ver en el menú el enlace departamento',
          ]);
          Permission::create([
            'name' => 'Crear departamento',
            'categoria' => 'ubicacion',
            'slug' => 'crear.departamento',
            'description' => 'El usuario puede ver el boton de crear departamento.',
          ]);
          Permission::create([
            'name' => 'Editar departamento',
            'categoria' => 'ubicacion',
            'slug' => 'editar.departamento',
            'description' => 'El usuario puede ver el boton de editar departamento.',
          ]);
          Permission::create([
            'name' => 'Eliminar departamento',
            'categoria' => 'ubicacion',
            'slug' => 'eliminar.departamento',
            'description' => 'El usuario puede ver el boton de eliminar departamento.',
          ]);
        // Permisos de municipio
          Permission::create([
            'name' => 'Navegar municipio',
            'categoria' => 'ubicacion',
            'slug' => 'navegar.municipio',
            'description' => 'El usuario puede ver en el menú el enlace municipio.',
          ]);
          Permission::create([
            'name' => 'Crear municipio',
            'categoria' => 'ubicacion',
            'slug' => 'crear.municipio',
            'description' => 'El usuario puede ver el boton de crear municipio.',
          ]);
          Permission::create([
            'name' => 'Editar municipio',
            'categoria' => 'ubicacion',
            'slug' => 'editar.municipio',
            'description' => 'El usuario puede ver el boton de editar municipio.',
          ]);
          Permission::create([
            'name' => 'Eliminar municipio',
            'categoria' => 'ubicacion',
            'slug' => 'eliminar.municipio',
            'description' => 'El usuario puede ver el boton de eliminar municipio.',
          ]);

    }
}
