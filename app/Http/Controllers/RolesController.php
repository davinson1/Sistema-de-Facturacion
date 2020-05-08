<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Caffeinated\Shinobi\Models\Role;
use App\Http\Requests\RolRequest;
use Illuminate\Support\Facades\DB;
use Caffeinated\Shinobi\Models\Permission;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function listarRoles(){
        $rol = Role::all();
        return view('usuarios/roles/tabla_rol',compact('rol'));
    }

    public function index(Role $rol)
    {
      $permissions = Permission::get();
      return view('usuarios/roles/roles', compact('rol','permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolRequest $request)
    { 
      if ($request->ajax()) {
        $rol = Role::create($request->all());

        // Actualizar permisos
        $rol->permissions()->sync($request->get('permissions'));
        
        return response()->json([
        "mensaje" => "Rol creado correctamente."
         ]);
      }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $rol)
    {
      $permissions = Permission::get();
      return view('usuarios/roles/editar_rol', compact('rol', 'permissions'));
      // return compact('rol', 'permissions');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $rol)
    {
    // Actualizar Rol
        $rol->update($request->all());

        //Actualizar permisos
        $rol->permissions()->sync($request->get('permissions'));
        return response()->json([
        "mensaje" => "Rol actualizado correctamente."
         ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $rol)
    {
        $rol->delete();

        return response()->json([
        "mensaje" => "Rol eliminado correctamente."
         ]);
    }

}
