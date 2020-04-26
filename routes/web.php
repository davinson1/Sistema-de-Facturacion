<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Auth\LoginController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function(){


  // Rutas para usuarios
  Route::get('/usuarios', 'UsuariosController@index')->name('usuarios')->middleware('can:navegar.usuario');
  Route::get('/listar_usuarios', 'UsuariosController@listarUsuarios');
  Route::post('/usuarios_eliminar', 'UsuariosController@destroy')->name('usuarios_eliminar');

  // Rutas para roles
  Route::get('/roles', 'RolesController@index')->name('roles');
  Route::get('listar_roles', 'RolesController@listarRoles');
  Route::post('/roles_crear', 'RolesController@store')->name('roles_crear');
  Route::post('/roles_editar', 'RolesController@update')->name('roles_editar');
  Route::post('/roles_eliminar', 'RolesController@destroy')->name('roles_eliminar');

  // Rutas para permisos
  Route::get('/permisos', 'PermisosController@index')->name('permisos');

  // Rutas para tipo de documentos
  Route::get('/tipo_documento', 'TipoDocumentoController@index')->name('tipo_documento');
  Route::get('tabla_tipo_documento', 'TipoDocumentoController@listarTipoDocumento');
  Route::post('/tipo_documento_crear', 'TipoDocumentoController@store')->name('tipo_documento_crear');
  Route::post('/tipo_documento_editar', 'TipoDocumentoController@update')->name('tipo_documento_editar');
  Route::post('/tipo_documento_eliminar', 'TipoDocumentoController@destroy')->name('tipo_documento_eliminar');

  // Rutas para pais
  Route::get('/pais', 'PaisController@index')->name('pais');
  Route::get('/listar_pais', 'PaisController@listarPais');
  Route::post('/pais_crear', 'PaisController@store')->name('pais_crear');
  Route::post('/pais_editar', 'PaisController@update')->name('pais_editar');
  Route::post('/paises_eliminar', 'PaisController@destroy')->name('paises_eliminar');


  // Rutas para municipios
  Route::get('/municipios', 'MunicipiosController@index')->name('municipios');
  Route::get('/listar_municipios', 'MunicipiosController@listarMunicipios');
  Route::post('/municipios_crear', 'MunicipiosController@store')->name('municipios_crear');
  Route::post('/municipios_editar', 'MunicipiosController@update')->name('municipios_editar');
  Route::post('/municipios_eliminar', 'MunicipiosController@destroy')->name('municipios_eliminar');
});
