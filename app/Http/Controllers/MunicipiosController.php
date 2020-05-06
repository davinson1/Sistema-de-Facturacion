<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Municipios;
use App\Models\Departamentos;
use App\Http\Requests\MunicipioRequest;

class MunicipiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function listarMunicipios()
    {
      $municipio = Municipios::all();
      return view('ubicacion/municipio/tabla_municipio', compact('municipio'));
    }

    public function index()
    {
      $departamento = Departamentos::all();      
      return view('ubicacion/municipio/municipio', compact('departamento'));
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
    public function store(MunicipioRequest $request)
    {
      if ($request->ajax()) {
      $municipio = new Municipios();
      $municipio->id_departamento = $request->idDepartamento;
      $municipio->nombre = $request->nombre;
      $municipio->save();
      return response()->json([
      "mensaje" => "Municipio creado correctamente."
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
    public function update(MunicipioRequest $request)
    {
      if ($request->ajax()) {

      $municipio = Municipios::Find($request->idMunicipio);
      $municipio->id_departamento = $request->idDepartamento;
      $municipio->nombre = $request->nombre;
      $municipio->save();

      return response()->json([
      "mensaje" => "Municipio editado correctamente."
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
      $municipio = Municipios::Find($id->idMunicipio);
      $municipio->delete();

      return response()->json([
      "mensaje" => "Municipio eliminado correctamente."
       ]);
    }
}
