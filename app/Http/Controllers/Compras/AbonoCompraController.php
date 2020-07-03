<?php

namespace App\Http\Controllers\Compras;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AbonoCompra;
use App\Models\Compra;
use App\Models\Porcentaje;

class AbonoCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $compras = Compra::all();
      $intereses = Porcentaje::all();
      return view('compras/abono_compra/abono_compra', compact('compras', 'intereses'));
    }

    public function listarAbonosCompra()
    {
      $abonosCompras = AbonoCompra::all();
      return view('compras/abono_compra/tabla_abono_compra', compact('abonosCompras'));
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
        'id_compra'           => 'required|numeric',
        'interes'             => 'required|numeric',
        'numero_cuota'        => 'required|numeric',
        'total_cuota'         => 'required|numeric',
        'fecha_programada'    => 'required|date',
        'fecha_compromiso'    => 'required|date',
        'fecha_pago'          => 'required|date',
        'valor'               => 'required|numeric',
        'valor_pago'          => 'required|numeric',
        'descripcion_no_pago' => 'required',
        'pagado'              => 'required|numeric',        
      ]);
      if ($request->ajax()) {
        AbonoCompra::create($request->all());
        return response()->json([
          "mensaje" => "Abono compra creado correctamente."
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AbonoCompra $idAbonoCompra)
    {
      $idAbonoCompra->delete();
      return response()->json([
        "mensaje" => "Abono compra eliminada correctamente."
      ]);
    }
}
