<?php

namespace App\Http\Controllers\Productos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoArticulo;

class TipoArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('productos/tipo_articulo/tipo_articulo');

    }

    public function ListarTipoArticulo(){
        $tparticulo = TipoArticulo::all();
        return view('productos/tipo_articulo/tabla_tipoarticulo', compact('tparticulo'));
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
            'nombre' => 'required|min:3|max:100|unique:tipo_articulo,nombre|regex:/^[\pL\s\-]+$/u',
        ]);

        if ($request->ajax()) {
        $tparticulo = new TipoArticulo();
        $tparticulo->nombre = $request->nombre;
        $tparticulo->save();
        return response()->json([
          "mensaje" => "Tipo articulo creado correctamente."
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TipoArticulo $idtparticulo)
    {
        if ($request->ajax()) {
        $idtparticulo->update($request->all());
        return response()->json([
          "mensaje" => "Tipo de articulo editado correctamente."
        ]);
      }
       }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoArticulo $idtparticulo)
    {
        $idtparticulo->delete();
      return response()->json([
        "mensaje" => "Tipo de articulo eliminado correctamente."
      ]);    }
}
