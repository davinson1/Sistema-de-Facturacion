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
Route::get('/registro_usuarios', 'RegistroUsuariosController@index')->name('registro_usuarios');
Route::get('/lista_usuarios', 'ListaUsuariosController@index')->name('lista_usuarios');
Route::get('/permisos', 'PermisosController@index')->name('permisos');

//rutas para rolres
Route::get('/roles', 'RolesController@index')->name('roles');
Route::post('/roles_crear', 'RolesController@store')->name('roles_crear');
Route::post('/roles_editar', 'RolesController@update')->name('roles_editar');
Route::post('/roles_eliminar', 'RolesController@destroy')->name('roles_eliminar');
Route::get('roleslist', 'RolesController@listing');

// rutas para pais
Route::get('/pais', 'PaisController@index')->name('pais');
Route::get('/listar_pais', 'PaisController@listar_pais');
Route::post('/pais_crear', 'PaisController@store')->name('pais_crear');
Route::post('/pais_editar', 'PaisController@update')->name('pais_editar');
Route::post('/paises_eliminar', 'PaisController@destroy')->name('paises_eliminar');