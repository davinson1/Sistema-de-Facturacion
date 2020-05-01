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
          'categoria' => 'usuario',
          'name' => 'Navegar usuario',
          'slug' => 'navegar.usuario',
          'description' => 'El usuario puede ver en el menú el enlace usuarios.',
        ]);
        Permission::create([
          'categoria' => 'usuario',
          'name' => 'Crear usuario',
          'slug' => 'crear.usuario',
          'description' => 'El usuario puede ver el boton de crear usuarios.',
        ]);
        Permission::create([
          'categoria' => 'usuario',
          'name' => 'Editar usuario',
          'slug' => 'editar.usuario',
          'description' => 'El usuario puede ver el boton de editar usuarios.',
        ]);
        Permission::create([
          'categoria' => 'usuario',
          'name' => 'Eliminar usuario',
          'slug' => 'eliminar.usuario',
          'description' => 'El usuario puede ver el boton de eliminar usuarios.',
        ]);

        // Permisos de roles
          Permission::create([
            'categoria' => 'usuario',
            'name' => 'Navegar roles',
            'slug' => 'navegar.rol',
            'description' => 'Lista y navega todos los roles del sistemas.',
          ]);
          Permission::create([
            'categoria' => 'usuario',
            'name' => 'Crear de roles',
            'slug' => 'crear.rol',
            'description' => 'Crear cualquier rol.',
          ]);
          Permission::create([
            'categoria' => 'usuario',
            'name' => 'Edición de roles',
            'slug' => 'editar.rol',
            'description' => 'Editar cualquier rol.',
          ]);
          Permission::create([
            'categoria' => 'usuario',
            'name' => 'Eliminar rol',
            'slug' => 'eliminar.rol',
            'description' => 'Eliminar cualquier rol.',
          ]);

        // Permisos de tipo de documento
          Permission::create([
            'categoria' => 'usuario',
            'name' => 'Navegar tipo de documento',
            'slug' => 'navegar.tipo.documento',
            'description' => 'Lista y navega todos los tipo de documento del sistemas.',
          ]);
          Permission::create([
            'categoria' => 'usuario',
            'name' => 'Crear de tipo de documento',
            'slug' => 'crear.tipo.documento',
            'description' => 'Crear cualquier tipo de documento.',
          ]);
          Permission::create([
            'categoria' => 'usuario',
            'name' => 'Edición de tipo de documento',
            'slug' => 'editar.tipo.documento',
            'description' => 'Editar cualquier tipo de documento.',
          ]);
          Permission::create([
            'categoria' => 'usuario',
            'name' => 'Eliminar tipo de documento',
            'slug' => 'eliminar.tipo.documento',
            'description' => 'Eliminar cualquier tipo de documento.',
          ]);

      // Permisos de ubicacion
        Permission::create([
          'categoria' => 'ubicacion',
          'name' => 'Navegar ubicación',
          'slug' => 'navegar.ubicacion',
          'description' => 'El usuario puede ver en el menú el enlace ubicación.',
        ]);
        // Permisos de país
          Permission::create([
            'categoria' => 'ubicacion',
            'name' => 'Navegar país',
            'slug' => 'navegar.pais',
            'description' => 'El usuario puede ver en el menú el enlace país.',
          ]);
          Permission::create([
            'categoria' => 'ubicacion',
            'name' => 'Crear país',
            'slug' => 'crear.pais',
            'description' => 'El usuario puede ver el boton de crear país.',
          ]);
          Permission::create([
            'categoria' => 'ubicacion',
            'name' => 'Editar país',
            'slug' => 'editar.pais',
            'description' => 'El usuario puede ver el boton de editar país.',
          ]);
          Permission::create([
            'categoria' => 'ubicacion',
            'name' => 'Eliminar país',
            'slug' => 'eliminar.pais',
            'description' => 'El usuario puede ver el boton de eliminar país.',
          ]);
        // Permisos de departamento
          Permission::create([
            'categoria' => 'ubicacion',
            'name' => 'Navegar departamento',
            'slug' => 'navegar.departamento',
            'description' => 'El usuario puede ver en el menú el enlace departamento.',
          ]);
          Permission::create([
            'categoria' => 'ubicacion',
            'name' => 'Crear departamento',
            'slug' => 'crear.departamento',
            'description' => 'El usuario puede ver el boton de crear departamento.',
          ]);
          Permission::create([
            'categoria' => 'ubicacion',
            'name' => 'Editar departamento',
            'slug' => 'editar.departamento',
            'description' => 'El usuario puede ver el boton de editar departamento.',
          ]);
          Permission::create([
            'categoria' => 'ubicacion',
            'name' => 'Eliminar departamento',
            'slug' => 'eliminar.departamento',
            'description' => 'El usuario puede ver el boton de eliminar departamento.',
          ]);
        // Permisos de municipio
          Permission::create([
            'categoria' => 'ubicacion',
            'name' => 'Navegar municipio',
            'slug' => 'navegar.municipio',
            'description' => 'El usuario puede ver en el menú el enlace municipio.',
          ]);
          Permission::create([
            'categoria' => 'ubicacion',
            'name' => 'Crear municipio',
            'slug' => 'crear.municipio',
            'description' => 'El usuario puede ver el boton de crear municipio.',
          ]);
          Permission::create([
            'categoria' => 'ubicacion',
            'name' => 'Editar municipio',
            'slug' => 'editar.municipio',
            'description' => 'El usuario puede ver el boton de editar municipio.',
          ]);
          Permission::create([
            'categoria' => 'ubicacion',
            'name' => 'Eliminar municipio',
            'slug' => 'eliminar.municipio',
            'description' => 'El usuario puede ver el boton de eliminar municipio.',
          ]);
    }
}
