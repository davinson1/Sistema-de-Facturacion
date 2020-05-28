<?php

namespace App\Http\Controllers\Productos;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\TipoFactura;
use App\Http\Requests\TipoFacturaRequest;

class TipoFacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('productos/tipo_factura/tipos_factura');
    }

    public function listarTiposFacturas()
    {
      $tiposFacturas = TipoFactura::all();
      return view('productos/tipo_factura/tabla_tipo_factura', compact('tiposFacturas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoFacturaRequest $request)
    {
      if ($request->ajax()) {
        $tipoFactura = new TipoFactura();
        $tipoFactura->nombre = $request->nombre;
        $tipoFactura->save();
        return response()->json([
          "mensaje" => "Tipo de factura creado correctamente."
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
    public function update(TipoFacturaRequest $request, TipoFactura $idTipoFactura)
    {
      if ($request->ajax()) {
        $idTipoFactura->update($request->all());
        return response()->json([
          "mensaje" => "Tipo de factura editado correctamente."
        ]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoFactura $idTipoFactura)
    {
      $idTipoFactura->delete();
      return response()->json([
        "mensaje" => "Tipo de factura eliminado correctamente."
      ]);      
    }
}
