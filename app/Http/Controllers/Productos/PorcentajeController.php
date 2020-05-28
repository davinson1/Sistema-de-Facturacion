<?php

namespace App\Http\Controllers\Productos;
use App\Http\Controllers\Controller;

use App\Models\Porcentaje;
use Illuminate\Http\Request;


class PorcentajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('productos/porcentaje/porcentajes');
    }

    //metodo para listar porcentajes
    public function listarprocentaje() {
        $porcentaje = Porcentaje::all();
      return view('productos/porcentaje/tabla_porcentaje', compact('porcentaje'));

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
            'descripcion' => 'max:100',
            'porcentaje' => 'required'
        ]);

        if ($request->ajax()) {
        $porcentaje = new Porcentaje();
        $porcentaje->nombre = $request->nombre;
        $porcentaje->descripcion = $request->descripcion;
        $porcentaje->porcentaje = $request->porcentaje;
        $porcentaje->save();
        return response()->json([
          "mensaje" => "Porcentaje creado correctamente."
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
    public function update(Request $request,Porcentaje $idporcentaje)
    {
         request()->validate([
            'nombre' => 'required|min:3|max:100|unique:porcentaje,nombre|regex:/^[\pL\s\-]+$/u',
            'descripcion' => 'max:100',
            'porcentaje' => 'required'
        ]);
      if ($request->ajax()) {
        $idporcentaje->update($request->all());
        return response()->json([
          "mensaje" => "POrcentaje editado correctamente."
        ]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Porcentaje $idporcentaje)
    {
          $idporcentaje->delete();
      return response()->json([
        "mensaje" => "porcentaje eliminado correctamente."
      ]);
       }
}
