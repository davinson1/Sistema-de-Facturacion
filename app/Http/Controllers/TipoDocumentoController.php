<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;
use App\Models\TipoDocumento;
use App\Http\Requests\TipoDocRequest;
use Illuminate\Support\Facades\DB;

class TipoDocumentoController extends Controller
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

    public function listing(){
        $tipoDoc = TipoDocumento::all();
        return view('usuarios/tabla_tipo_documento',compact('tipoDoc'));
    }

    public function index()
    {
        return view('/usuarios/tipo_documento');
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
    public function store(TipoDocRequest $request)
    {
        if ($request->ajax()) {
        $tipoDoc = new TipoDocumento();
        $tipoDoc->Nombre = $request->nombre;
        $tipoDoc->save();
        return response()->json([
        "mensaje" => "Tipo de documento creado correctamente."
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
    public function update(TipoDocRequest $request)
    {
        if ($request->ajax()) {

        $rol = TipoDocumento::Find($request->id_tipo);
        $rol->Nombre = $request->nombre;
        $rol->save();

        return response()->json([
        "mensaje" => "Tipo de documento editado correctamente."
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
        $rol = TipoDocumento::Find($id->id_tipo);
        $rol->delete();

        return response()->json([
        "mensaje" => "Tipo de documento eliminado correctamente."
         ]);
    }
}
