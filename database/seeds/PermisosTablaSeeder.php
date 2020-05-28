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
      // Permisos para el modulo usuarios
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

        // Permisos de empresa
          Permission::create([
            'name' => 'Navegar empresas',
            'categoria' => 'usuario',
            'slug' => 'navegar.empresa',
            'description' => 'Lista y navega todas las empresa del sistemas.',
          ]);
          Permission::create([
            'name' => 'Crear de empresa',
            'categoria' => 'usuario',
            'slug' => 'crear.empresa',
            'description' => 'Crear  empresa.',
          ]);
          Permission::create([
            'name' => 'Edición de empresa',
            'categoria' => 'usuario',
            'slug' => 'editar.empresa',
            'description' => 'Editar empresa.',
          ]);
          Permission::create([
            'name' => 'Eliminar empresa',
            'categoria' => 'usuario',
            'slug' => 'eliminar.empresa',
            'description' => 'Eliminar empresa.',
          ]);

      // Permisos para el modulo ubicacion
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
            'description' => 'El usuario puede ver en el menú el enlace departamento.',
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

      // Permisos para el modulo productos
        Permission::create([
          'name' => 'Navegar modulo productos',
          'categoria' => 'productos',
          'slug' => 'navegar.modulo.productos',
          'description' => 'El usuario puede desplegar el menú productos.',
        ]);
        Permission::create([
          'name' => 'Navegar productos',
          'categoria' => 'productos',
          'slug' => 'navegar.productos',
          'description' => 'El usuario puede ver en el menú el enlace productos.',
        ]);
        Permission::create([
          'name' => 'Crear productos',
          'categoria' => 'productos',
          'slug' => 'crear.productos',
          'description' => 'El usuario puede ver el boton de crear productos.',
        ]);
        Permission::create([
          'name' => 'Editar productos',
          'categoria' => 'productos',
          'slug' => 'editar.productos',
          'description' => 'El usuario puede ver el boton de editar productos.',
        ]);
        Permission::create([
          'name' => 'Eliminar productos',
          'categoria' => 'productos',
          'slug' => 'eliminar.productos',
          'description' => 'El usuario puede ver el boton de eliminar productos.',
        ]);
        // Permisos de proveedor
          Permission::create([
            'name' => 'Navegar proveedores',
            'categoria' => 'productos',
            'slug' => 'navegar.proveedores',
            'description' => 'El usuario puede ver en el menú el enlace proveedores.',
          ]);
          Permission::create([
            'name' => 'Crear proveedores',
            'categoria' => 'productos',
            'slug' => 'crear.proveedores',
            'description' => 'El usuario puede ver el boton de crear proveedores.',
          ]);
          Permission::create([
            'name' => 'Editar proveedores',
            'categoria' => 'productos',
            'slug' => 'editar.proveedores',
            'description' => 'El usuario puede ver el boton de editar proveedores.',
          ]);
          Permission::create([
            'name' => 'Eliminar proveedores',
            'categoria' => 'productos',
            'slug' => 'eliminar.proveedores',
            'description' => 'El usuario puede ver el boton de eliminar proveedores.',
          ]);
          // Permisos de articulos
          Permission::create([
            'name' => 'Navegar articulos',
            'categoria' => 'productos',
            'slug' => 'navegar.articulos',
            'description' => 'El usuario puede ver en el menú el enlace articulos.',
          ]);
          Permission::create([
            'name' => 'Crear articulos',
            'categoria' => 'productos',
            'slug' => 'crear.articulos',
            'description' => 'El usuario puede ver el boton de crear articulos.',
          ]);
          Permission::create([
            'name' => 'Editar articulos',
            'categoria' => 'productos',
            'slug' => 'editar.articulos',
            'description' => 'El usuario puede ver el boton de editar articulos.',
          ]);
          Permission::create([
            'name' => 'Eliminar articulos',
            'categoria' => 'productos',
            'slug' => 'eliminar.articulos',
            'description' => 'El usuario puede ver el boton de eliminar articulos.',
          ]);
        // Permisos de formas de pago
          Permission::create([
            'name' => 'Navegar formas de pago',
            'categoria' => 'productos',
            'slug' => 'navegar.formas.pagos',
            'description' => 'El usuario puede ver en el menú el enlace formas de pagos.',
          ]);
          Permission::create([
            'name' => 'Crear formas de pago',
            'categoria' => 'productos',
            'slug' => 'crear.formas.pagos',
            'description' => 'El usuario puede ver el boton de crear formas de pagos.',
          ]);
          Permission::create([
            'name' => 'Editar formas de pago',
            'categoria' => 'productos',
            'slug' => 'editar.formas.pagos',
            'description' => 'El usuario puede ver el boton de editar formas de pagos.',
          ]);
          Permission::create([
            'name' => 'Eliminar formas de pago',
            'categoria' => 'productos',
            'slug' => 'eliminar.formas.pagos',
            'description' => 'El usuario puede ver el boton de eliminar formas de pagos.',
          ]);
        // Permisos de iva
          Permission::create([
            'name' => 'Navegar iva',
            'categoria' => 'productos',
            'slug' => 'navegar.iva',
            'description' => 'El usuario puede ver en el menú el enlace iva.',
          ]);
          Permission::create([
            'name' => 'Crear iva',
            'categoria' => 'productos',
            'slug' => 'crear.iva',
            'description' => 'El usuario puede ver el boton de crear iva.',
          ]);
          Permission::create([
            'name' => 'Editar iva',
            'categoria' => 'productos',
            'slug' => 'editar.iva',
            'description' => 'El usuario puede ver el boton de editar iva.',
          ]);
          Permission::create([
            'name' => 'Eliminar iva',
            'categoria' => 'productos',
            'slug' => 'eliminar.iva',
            'description' => 'El usuario puede ver el boton de eliminar iva.',
          ]);
        // Permisos de porcentaje
          Permission::create([
            'name' => 'Navegar porcentaje',
            'categoria' => 'productos',
            'slug' => 'navegar.porcentaje',
            'description' => 'El usuario puede ver en el menú el enlace porcentaje.',
          ]);
          Permission::create([
            'name' => 'Crear porcentaje',
            'categoria' => 'productos',
            'slug' => 'crear.porcentaje',
            'description' => 'El usuario puede ver el boton de crear porcentaje.',
          ]);
          Permission::create([
            'name' => 'Editar porcentaje',
            'categoria' => 'productos',
            'slug' => 'editar.porcentaje',
            'description' => 'El usuario puede ver el boton de editar porcentaje.',
          ]);
          Permission::create([
            'name' => 'Eliminar porcentaje',
            'categoria' => 'productos',
            'slug' => 'eliminar.porcentaje',
            'description' => 'El usuario puede ver el boton de eliminar porcentaje.',
          ]);
        // Permisos de tipos de facturas
          Permission::create([
            'name' => 'Navegar tipos de facturas',
            'categoria' => 'productos',
            'slug' => 'navegar.tipos.facturas',
            'description' => 'El usuario puede ver en el menú el enlace tipos de facturas.',
          ]);
          Permission::create([
            'name' => 'Crear tipos de facturas',
            'categoria' => 'productos',
            'slug' => 'crear.tipos.facturas',
            'description' => 'El usuario puede ver el boton de creartipos de facturas.',
          ]);
          Permission::create([
            'name' => 'Editar tipos de facturas',
            'categoria' => 'productos',
            'slug' => 'editar.tipos.facturas',
            'description' => 'El usuario puede ver el boton de editar tipos de facturas.',
          ]);
          Permission::create([
            'name' => 'Eliminar tipos de facturas',
            'categoria' => 'productos',
            'slug' => 'eliminar.tipos.facturas',
            'description' => 'El usuario puede ver el boton de eliminar tipos de facturas.',
          ]);
        // Permisos de tipos tributarios
          Permission::create([
            'name' => 'Navegar tipos tributarios',
            'categoria' => 'productos',
            'slug' => 'navegar.tipos.tributario',
            'description' => 'El usuario puede ver en el menú el enlace tipos tributarios.',
          ]);
          Permission::create([
            'name' => 'Crear tipos tributarios',
            'categoria' => 'productos',
            'slug' => 'crear.tipos.tributario',
            'description' => 'El usuario puede ver el boton de creartipos tributarios.',
          ]);
          Permission::create([
            'name' => 'Editar tipos tributarios',
            'categoria' => 'productos',
            'slug' => 'editar.tipos.tributario',
            'description' => 'El usuario puede ver el boton de editar tipos tributarios.',
          ]);
          Permission::create([
            'name' => 'Eliminar tipos tributarios',
            'categoria' => 'productos',
            'slug' => 'eliminar.tipos.tributario',
            'description' => 'El usuario puede ver el boton de eliminar tipos tributarios.',
          ]);
    }
}
