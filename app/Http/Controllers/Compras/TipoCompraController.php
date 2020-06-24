<?php

namespace App\Http\Controllers\Compras;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoCompra;

class TipoCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('compras/tipo_compra/tipo_compra');
    }

    public function listarTiposCompras()
    {
      $tiposCompras = TipoCompra::all();
      return view('compras/tipo_compra/tabla_tipo_compra', compact('tiposCompras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = request()->validate([        
        'nombre'      => 'required|min:3|unique:tipo_compra,nombre',
        'descripcion' => 'required',
      ]);

      if ($request->ajax()) {
        $tipoCompra              = new TipoCompra();
        $tipoCompra->nombre      = $request->nombre;
        $tipoCompra->descripcion = $request->descripcion;
        $tipoCompra->save();


        return response()->json([
          "mensaje" => "Tipo de compra creada correctamente."
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
    public function update(Request $request, TipoCompra $idTipoCompra)
    {
      $data = request()->validate([        
        'nombre'      => 'required|min:3|unique:tipo_compra,nombre,'.$idTipoCompra->id,
        'descripcion' => 'required',
      ]);

      if ($request->ajax()) {
        
        $idTipoCompra->update($request->all());

        return response()->json([
          "mensaje" => "Tipo de compra editado correctamente."
        ]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoCompra $idTipoCompra)
    {
      $idTipoCompra->delete();
      return response()->json([
        "mensaje" => "Tipo de compra eliminado correctamente."
      ]);
    }
}
