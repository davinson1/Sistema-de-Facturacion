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
          'slug' => 'navegar.usuario',
          'description' => 'El usuario puede ver en el menú el enlace usuarios.',
        ]);
        Permission::create([
          'name' => 'Crear usuario',
          'slug' => 'crear.usuario',
          'description' => 'El usuario puede ver el boton de crear usuarios.',
        ]);
        Permission::create([
          'name' => 'Editar usuario',
          'slug' => 'editar.usuario',
          'description' => 'El usuario puede ver el boton de editar usuarios.',
        ]);
        Permission::create([
          'name' => 'Eliminar usuario',
          'slug' => 'eliminar.usuario',
          'description' => 'El usuario puede ver el boton de eliminar usuarios.',
        ]);

        // Permisos de roles
          Permission::create([
            'name' => 'Navegar roles',
            'slug' => 'navegar.rol',
            'description' => 'Lista y navega todos los roles del sistemas.',
          ]);
          Permission::create([
            'name' => 'Crear de roles',
            'slug' => 'crear.rol',
            'description' => 'Crear cualquier rol.',
          ]);
          Permission::create([
            'name' => 'Edición de roles',
            'slug' => 'editar.rol',
            'description' => 'Editar cualquier rol.',
          ]);
          Permission::create([
            'name' => 'Eliminar rol',
            'slug' => 'eliminar.rol',
            'description' => 'Eliminar cualquier rol.',
          ]);

        // Permisos de tipo de documento
          Permission::create([
            'name' => 'Navegar tipo de documento',
            'slug' => 'navegar.tipo.documento',
            'description' => 'Lista y navega todos los tipo de documento del sistemas.',
          ]);
          Permission::create([
            'name' => 'Crear de tipo de documento',
            'slug' => 'crear.tipo.documento',
            'description' => 'Crear cualquier tipo de documento.',
          ]);
          Permission::create([
            'name' => 'Edición de tipo de documento',
            'slug' => 'editar.tipo.documento',
            'description' => 'Editar cualquier tipo de documento.',
          ]);
          Permission::create([
            'name' => 'Eliminar tipo de documento',
            'slug' => 'eliminar.tipo.documento',
            'description' => 'Eliminar cualquier tipo de documento.',
          ]);

      // Permisos de ubicacion
        Permission::create([
          'name' => 'Navegar ubicación',
          'slug' => 'navegar.ubicacion',
          'description' => 'El usuario puede ver en el menú el enlace ubicación.',
        ]);
        // Permisos de país
          Permission::create([
            'name' => 'Navegar país',
            'slug' => 'navegar.pais',
            'description' => 'El usuario puede ver en el menú el enlace país.',
          ]);
          Permission::create([
            'name' => 'Crear país',
            'slug' => 'crear.pais',
            'description' => 'El usuario puede ver el boton de crear país.',
          ]);
          Permission::create([
            'name' => 'Editar país',
            'slug' => 'editar.pais',
            'description' => 'El usuario puede ver el boton de editar país.',
          ]);
          Permission::create([
            'name' => 'Eliminar país',
            'slug' => 'eliminar.pais',
            'description' => 'El usuario puede ver el boton de eliminar país.',
          ]);
        // Permisos de departamento
          Permission::create([
            'name' => 'Navegar departamento',
            'slug' => 'navegar.departamento',
            'description' => 'El usuario puede ver en el menú el enlace departamento.',
          ]);
          Permission::create([
            'name' => 'Crear departamento',
            'slug' => 'crear.departamento',
            'description' => 'El usuario puede ver el boton de crear departamento.',
          ]);
          Permission::create([
            'name' => 'Editar departamento',
            'slug' => 'editar.departamento',
            'description' => 'El usuario puede ver el boton de editar departamento.',
          ]);
          Permission::create([
            'name' => 'Eliminar departamento',
            'slug' => 'eliminar.departamento',
            'description' => 'El usuario puede ver el boton de eliminar departamento.',
          ]);
        // Permisos de municipio
          Permission::create([
            'name' => 'Navegar municipio',
            'slug' => 'navegar.municipio',
            'description' => 'El usuario puede ver en el menú el enlace municipio.',
          ]);
          Permission::create([
            'name' => 'Crear municipio',
            'slug' => 'crear.municipio',
            'description' => 'El usuario puede ver el boton de crear municipio.',
          ]);
          Permission::create([
            'name' => 'Editar municipio',
            'slug' => 'editar.municipio',
            'description' => 'El usuario puede ver el boton de editar municipio.',
          ]);
          Permission::create([
            'name' => 'Eliminar municipio',
            'slug' => 'eliminar.municipio',
            'description' => 'El usuario puede ver el boton de eliminar municipio.',
          ]);
    }
}
