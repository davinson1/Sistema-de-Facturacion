<?php

namespace App\Http\Controllers\Productos;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\TipoTributario;
use App\Http\Requests\TipoTributarioRequest;

class TipoTributarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('productos/tipo_tributario/tipos_tributario');
    }

    public function listarTiposTributarios()
    {
      $tiposTributarios = TipoTributario::all();
      return view('productos/tipo_tributario/tabla_tipo_tributario', compact('tiposTributarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoTributarioRequest $request)
    {
      if ($request->ajax()) {
        $tipoTributario = new TipoTributario();
        $tipoTributario->nombre = $request->nombre;
        $tipoTributario->save();
        return response()->json([
          "mensaje" => "Tipo tributario creado correctamente."
        ]);
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoTributarioRequest $request, TipoTributario $idTipoTributario)
    {
      if ($request->ajax()) {
        $idTipoTributario->update($request->all());
        return response()->json([
          "mensaje" => "Tipo tributario editado correctamente."
        ]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoTributario $idTipoTributario)
    {
      $idTipoTributario->delete();
      return response()->json([
        "mensaje" => "Tipo tributario eliminado correctamente."
      ]);    
    }
}
