<?php

namespace App\Http\Controllers\Productos;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\FormasPago;
use App\Http\Requests\FormaPagoRequest;

class FormasPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('productos/forma_pago/formas_pago');
    }

    public function listarFormaPago()
    {
      $formasPagos = FormasPago::all();
      return view('productos/forma_pago/tabla_formas_pago', compact('formasPagos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormaPagoRequest $request)
    {
      if ($request->ajax()) {
        $formaPago = new FormasPago();
        $formaPago->nombre = $request->nombre;
        $formaPago->save();
        return response()->json([
          "mensaje" => "Forma de pago creado correctamente."
        ]);
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormaPagoRequest $request, FormasPago $idFormaPago)
    {
      if ($request->ajax()) {
        $idFormaPago->update($request->all());
        return response()->json([
          "mensaje" => "Forma pago editado correctamente."
        ]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormasPago $idFormaPago)
    {
      $idFormaPago->delete();
      return response()->json([
        "mensaje" => "Forma pago eliminado correctamente."
      ]);
    }
}
