<?php

namespace App\Http\Controllers\Configuracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DatosEmpresa;
class DatosEmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $datos2 = DatosEmpresa::all();
      return view('configuracion/empresa/empresa')->with('dato',$datos2);

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
        'cnombreEmpresa' => 'required|min:3|max:100|regex:/^[\pL\s\-]+$/u',
        'cnitEmpresa' => 'required|min:5|numeric',
        'cregimen' => 'required|min:5',
        'crepresentacionl' => 'required|min:5',
        'cdireccion' => 'required|min:5',
        'ctelefono' => 'numeric|nullable',
        'cciudad' => 'required|min:5',
        'cciudad' => 'min:5|nullable',
        'cnombre2' => 'min:3|nullable',
        'clogo' => 'image',
      ]);

      if ($request->ajax()) {
        if (!$request->cidempresa) {
          if ($request->file('clogo') == null) {
                  $logo = "";
          }
          else{
                $logo = $request->file('clogo')->store('public/fotosusuarios');
          }


          $DatosEmpresa = new DatosEmpresa();
          $DatosEmpresa->nombre = $request->cnombreEmpresa;
          $DatosEmpresa->nit = $request->cnitEmpresa;
          $DatosEmpresa->regimen = $request->cregimen;
          $DatosEmpresa->reso_dian = $request->cdian;
          $DatosEmpresa->representacion_legal = $request->crepresentacionl;
          $DatosEmpresa->direccion = $request->cdireccion;
          $DatosEmpresa->telefono = $request->ctelefono;
          $DatosEmpresa->ciudad = $request->cciudad;
          $DatosEmpresa->ofrece = $request->cofrece;
          $DatosEmpresa->nombre_empresa_2 = $request->cnombre2;
          $DatosEmpresa->logo = $logo;
          $DatosEmpresa->save();

          return response()->json([
            "mensaje" => "Empresa Registrada correctamente"
          ]);
        }
        else {

          $DatosActualizar = DatosEmpresa::Find($request->cidempresa);
          if ($request->ajax()) {
            // Si el usuario cambia la foto
            if($request->hasFile('clogo')){
              // aquí compruebo que exista la foto anterior
              if (\Storage::exists($DatosActualizar->logo)){
                // aquí la borro
                \Storage::delete($DatosActualizar->logo);
              }
              $DatosActualizar->logo=\Storage::putFile('public/fotosusuarios', $request->file('clogo'));
            }


            $DatosActualizar->nombre = $request->cnombreEmpresa;
            $DatosActualizar->nit = $request->cnitEmpresa;
            $DatosActualizar->regimen = $request->cregimen;
            $DatosActualizar->reso_dian = $request->cdian;
            $DatosActualizar->representacion_legal = $request->crepresentacionl;
            $DatosActualizar->direccion = $request->cdireccion;
            $DatosActualizar->telefono = $request->ctelefono;
            $DatosActualizar->ciudad = $request->cciudad;
            $DatosActualizar->ofrece = $request->cofrece;
            $DatosActualizar->nombre_empresa_2 = $request->cnombre2;
            $DatosActualizar->save();

            return response()->json([
              "mensaje" => "Empresa Actualizada Correctamente"
            ]);
          }
        }
      }
    }
    
}
