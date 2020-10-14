<?php

namespace App\Http\Controllers\Compras;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ArticuloCompra;
use App\Models\Producto;
use App\Models\Compra;

class ConsultaComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $productos = Producto::all();
      $compras = Compra::all();
      return view('compras/consulta_compras/consulta_compra', compact('productos', 'compras'));
    }

    public function listarCompras()
    {
      $compras = Compra::all();
      return view('compras/consulta_compras/tabla_compras', compact('compras'));
    }

    public function listarComprasr(){

        $compras = Compra::all();
        return view('compras/compra/tabla_consulta_compras', compact('compras'));
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
        'id_articulo' => 'required|numeric',
        'id_compra'   => 'required|numeric',
        'cantidad'    => 'required|numeric',
        'entregado'   => 'required|numeric',
        'descripcion' => 'required',
      ]);
      if ($request->ajax()) {
        ArticuloCompra::create($request->all());
        return response()->json([
          "mensaje" => "Artículo compra creado correctamente."
        ]);
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticuloCompra $articuloCompra)
    {
      $productos = Producto::all()->sortBy('nombre', SORT_NATURAL | SORT_FLAG_CASE)->pluck('nombre', 'id');
      $compras = Compra::all()->sortBy('nombre', SORT_NATURAL | SORT_FLAG_CASE)->pluck('descripcion', 'id');
      return view('compras/articulo_compra/editar_articulo_compra', compact('articuloCompra','productos', 'compras'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function anularCompraRealizada(Request $request,Compra $idCompra)
    {

        if ($request->ajax()) {
            $idCompra->update($request->all());
            return response()->json([
              "mensaje" => "Compra Anulada correctamente."
            ]);
          }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticuloCompra $idArticuloCompra)
    {
      $idArticuloCompra->delete();
      return response()->json([
        "mensaje" => "Artículo compra eliminada correctamente."
      ]);
    }
}
