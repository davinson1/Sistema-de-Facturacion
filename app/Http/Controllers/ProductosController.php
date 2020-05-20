<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('productos/producto/productos');
    }


    public function listarproductos(){
        $producto = Productos::all();
      return view('productos/producto/tabla_producto', compact('producto'));
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
            'nombre' => 'required|min:3|max:100|unique:porcentaje,nombre|regex:/^[\pL\s\-]+$/u',
            'espcificaciones' => 'max:100',
        ]);

        if ($request->ajax()) {
        $producto = new Productos();
        $producto->nombre = $request->nombre;
        $producto->especificaciones = $request->especificaciones;
        $producto->save();
        return response()->json([
          "mensaje" => "producto creado correctamente."
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
    public function update(Request $request,Productos $idproducto)
    {

         request()->validate([
            'nombre' => 'required|min:3|max:100|unique:porcentaje,nombre|regex:/^[\pL\s\-]+$/u',
            'espcificaciones' => 'max:100',
        ]);
         if ($request->ajax()) {
        $idproducto->update($request->all());
        return response()->json([
          "mensaje" => "Producto editado correctamente."
        ]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productos $idproducto)
    {
         $idproducto->delete();
      return response()->json([
        "mensaje" => "porcentaje eliminado producto"
      ]);
       }

}
