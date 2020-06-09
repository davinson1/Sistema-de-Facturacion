<?php

namespace App\Http\Controllers\Productos;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Models\Empresa;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $empresas = Empresa::all();
      return view('productos/proveedor/proveedor',compact('empresas'));
    }

    public function listarProveedor()
    {
      $proveedores = Proveedor::all();
      return view('productos/proveedor/tabla_proveedor', compact('proveedores'));
    }

    public function listarEmpresas()
    {


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
    public function store(Request $request)
    {
        request()->validate([
            'nombre' => 'required|min:3|max:100|unique:proveedor,nombre|regex:/^[\pL\s\-]+$/u',
            'telefono' => 'min:9|numeric',
            'descripcion' => 'max:100',
        ]);
         if ($request->ajax()) {
        $proveedor = new Proveedor();
        $proveedor->id_empresa = $request->idempresa;
        $proveedor->id_usuario = Auth()->user()->id;
        $proveedor->nombre = $request->nombre;
        $proveedor->telefono = $request->telefono;
        $proveedor->descripcion = $request->descripcion;
        $proveedor->save();
        return response()->json([
          "mensaje" => "Proveedor creado correctamente."
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
    public function edit(Proveedor $idProveedor)
    {
         $empresas = Empresa::all();
      return view('productos/proveedor/editar_proveedor', compact('idProveedor','empresas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Proveedor $idProveedor)
    {

        $data = request()->validate([
            'nombre' => 'required|min:3|max:100|regex:/^[\pL\s\-]+$/u|unique:proveedor,nombre,'.$idProveedor->id,
            'telefono' => 'min:9|numeric',
            'descripcion' => 'max:100',

        ]);
        if ($request->ajax()) {
        $idProveedor->id_empresa = $request->id_empresa;
        $idProveedor->id_usuario_modifica = Auth()->user()->id;
        $idProveedor->nombre = $request->nombre;
        $idProveedor->telefono = $request->telefono;
        $idProveedor->descripcion = $request->descripcion;
        if ($request->estado == 'on' ) {
        $idProveedor->estado ='1';
        } else {
        $idProveedor->estado ='0';
        }
        $idProveedor->save();
        return response()->json([
          "mensaje" => "Proveedor actualizado correctamente."
        ]);
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $idProveedor)
    {
          $idProveedor->delete();
      return response()->json([
        "mensaje" => "proveedor eliminado correctamente."
      ]);
       }

}
