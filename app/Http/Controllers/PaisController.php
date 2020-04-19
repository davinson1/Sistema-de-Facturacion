<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;
use App\Models\Paises;
use App\Http\Requests\PaisRequest;
use Illuminate\Support\Facades\DB;

class PaisController extends Controller
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


    public function listar_pais()
    {
      $pais = Paises::all();
      return view('pais/tabla_pais', compact('pais'));
    }

    public function index()
    {
        return view('pais/pais');
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
    public function store(PaisRequest $request)
    {
        if ($request->ajax()) {
        $pais = new Paises();
        $pais->Nombre = $request->nombre;
        $pais->save();
        return response()->json([
        "mensaje" => "País creado correctamente."
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
    public function update(PaisRequest $request)
    {
        if ($request->ajax()) {

        $pais = Paises::Find($request->id_pais);
        $pais->Nombre = $request->nombre;
        $pais->save();

        return response()->json([
        "mensaje" => "País editado correctamente."
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
        $pais = Paises::Find($id->id_pais);
        $pais->delete();

        return response()->json([
        "mensaje" => "País eliminado correctamente."
         ]);
    }
}
