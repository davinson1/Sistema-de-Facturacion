<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\TipoTributario;
use App\Models\Municipios;
use App\Http\Requests\EmpresaRequest;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tipoTributario = TipoTributario::get();
      $municipios = Municipios::get();
      return view('usuarios/empresa/empresa', compact('tipoTributario', 'municipios'));
    }

    public function listarEmpresa()
    {
      $empresas = Empresa::all();
      return view('usuarios/empresa/tabla_empresa', compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {
      if ($request->ajax()) {
        $empresa = Empresa::create($request->all());        
        return response()->json([
        "mensaje" => "Empresa creada correctamente."
         ]);
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
      // $tipoTributario = TipoTributario::get();
      $tipoTributario = TipoTributario::all()->sortBy('nombre', SORT_NATURAL | SORT_FLAG_CASE)->pluck('nombre', 'id');
      $municipios = Municipios::all()->sortBy('nombre', SORT_NATURAL | SORT_FLAG_CASE)->pluck('nombre', 'id');
      return view('usuarios/empresa/editar_empresa', compact('empresa', 'tipoTributario', 'municipios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $idEmpresa)
    {
      $idEmpresa->update($request->all());
      return response()->json([
      "mensaje" => "Empresa actualizada correctamente."
       ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $idEmpresa)
    {
      $idEmpresa->delete();
      return response()->json([
        "mensaje" => "Empresa eliminada correctamente."
      ]);
    }
}
