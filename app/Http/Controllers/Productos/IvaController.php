<?php

namespace App\Http\Controllers\Productos;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Iva;
use App\Http\Requests\IvaRequest;

class IvaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('productos/iva/iva');
    }

    public function listarIva()
    {
      $ivas = Iva::all();
      return view('productos/iva/tabla_iva', compact('ivas'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IvaRequest $request)
    {
      if ($request->ajax()) {
        $iva = new Iva();
        $iva->valor_iva = $request->valor_iva;
        $iva->fecha_fin = $request->fecha_fin;
        $iva->save();
        return response()->json([
          "mensaje" => "Iva creado correctamente."
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
    public function update(IvaRequest $request, Iva $idIva)
    {
      if ($request->ajax()) {
        $idIva->update($request->all());
        return response()->json([
          "mensaje" => "Iva editado correctamente."
        ]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Iva $idIva)
    {
      $idIva->delete();
      return response()->json([
        "mensaje" => "Iva eliminado correctamente."
      ]);
    }
}
