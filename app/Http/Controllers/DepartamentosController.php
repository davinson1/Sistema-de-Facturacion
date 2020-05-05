<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamentos;
use App\Models\Paises;
use App\Http\Requests\DepartamentosRequest;


class DepartamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pais = Paises::all();
        return view('ubicacion/departamento/departamentos',compact('pais'));
    }


    public function ListarDepartamentos(){
        $departamento = Departamentos::all();
        return view('ubicacion/departamento/tabla_departamento', compact('departamento'));

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
    public function store(DepartamentosRequest $request)
    {

      if ($request->ajax()) {
      $Departamento = new DepartamentoS();
      $Departamento->id_pais = $request->idPais;
      $Departamento->nombre = $request->nombre;
      $Departamento->save();
      return response()->json([
      "mensaje" => "Departamento creado correctamente."
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
    public function update(DepartamentosRequest $request)
    {
        if ($request->ajax()) {

      $departamento = Departamentos::Find($request->idDepartamento);
      $departamento->nombre = $request->nombre;
      $departamento->save();
      return response()->json([
      "mensaje" => "Departamento editado correctamente."
       ]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $id)
    {

        $departamento = Departamentos::Find($id->idDepartamento);
        $departamento->delete();
      return response()->json([

           "mensaje" => "Departamento eliminado correctamente."


       ]);

    }
}
