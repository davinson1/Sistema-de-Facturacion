<?php

namespace App\Http\Controllers\Productos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoriaProductos;

class CateriaProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('productos/categoria_productos/categoria_productos');
    }


    public function listarCategoriaProductos(){
        $categoriap = CategoriaProductos::all();
      return view('productos/categoria_productos/tabla_categoria_productos', compact('categoriap'));
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
            'nombre' => 'required|min:3|max:100|unique:categoria_productos,nombre|regex:/^[\pL\s\-]+$/u',
            'detalle' => 'max:100|nullable'
        ]);
        if ($request->ajax()) {
            $categoriap = new CategoriaProductos();
            $categoriap->nombre = $request->nombre;
            $categoriap->detalle = $request->descripcion;
            $categoriap->save();
            return response()->json([
              "mensaje" => "Categoria creada correctamente."
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
    public function update(Request $request,CategoriaProductos  $idcategoriap)
    {


        if ($request->ajax()) {
            $idcategoriap->update($request->all());
            return response()->json([
              "mensaje" => "Categoria ".$request->nombre."  editada correctamente"
            ]);
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoriaProductos $idcategoriap)
    {
        $idcategoriap->delete();
        return response()->json([
          "mensaje" => "categoria eliminada correctamente."
        ]);

    }
}
