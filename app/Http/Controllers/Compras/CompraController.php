<?php

namespace App\Http\Controllers\Compras;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\TipoCompra;
use App\Models\FormasPago;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\CompraTemporal;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $proveedores = Proveedor::all();
      $tiposCompras = TipoCompra::all();
      $formasPago = FormasPago::all();
      return view('compras/compra/compra', compact('proveedores','tiposCompras','formasPago'));
    }

    public function buscarProducto() {
        $productos = Producto::all();
        return response()->json($productos);
    }

    public function guardarCompraTemportal(Request $request){
      request()->validate([
        'nombre' => 'min:3|max:100|unique:compra_temporal,nombre_producto',
      ],
      ['nombre.unique'=>'el producto '.'<strong>'.$request->nombre.'</strong>'.' ya esta agregado, por favor modifiqie las cantidades'
      ]);
      if ($request->ajax())
      {
        $temporal = new CompraTemporal();
        $temporal->token_usuario = md5(Auth()->user()->id);
        $temporal->nombre_producto = $request->nombre;
        $temporal->foto = $request->foto;
        $temporal->cantidad_producto = $request->cantidad_compra;
        $temporal->precio_compra = $request->precio_compra;
        $temporal->id_producto = $request->id_producto;
        $temporal->codigo_barras = $request->codigo_barras;
        $temporal->descripcion_producto = $request->descripcion_producto;
        $temporal->save();

        return response()->json([
          "mensaje" => "producto agregado correctamente."
        ]);
      }
    }

    public function listarCompras()
    {
      $compraTemportal = CompraTemporal::where('token_usuario', md5(Auth()->user()->id))->get();
      return view('compras/compra/tabla_compra', compact('compraTemportal'));
    }

    public function descartarProducto(CompraTemporal $idCompraTemporal)
    {
      $idCompraTemporal->delete();
      return response()->json([
        "mensaje" => "Producto ".$idCompraTemporal->nombre_producto." descartado."
      ]);
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
        'idTipoCompra'      => 'required|numeric',
        'idFormaPago'       => 'required|numeric',
        'scannerCompra'     => 'file',
        'descripcionCompra' => 'required',
      ]);

      if ($request->ajax()) {

        if ($request->scannerCompra==null) {
          $scanner = '';
        }else{
          $scanner = $request->file('scannerCompra')->store('public/scannerCompra');
        }

        $compra = new Compra();
        $compra->id_tipo_compra = $request->idTipoCompra;
        $compra->id_usuario     = Auth()->user()->id;
        $compra->id_forma_pago  = $request->idFormaPago;
        $compra->scanner        = $scanner;
        $compra->descripcion    = $request->descripcionCompra;
        $compra->save();


        return response()->json([
          "mensaje" => "Compra creada correctamente."
        ]);
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
      $tiposCompras = TipoCompra::all()->sortBy('nombre', SORT_NATURAL | SORT_FLAG_CASE)->pluck('nombre', 'id');
      $formasPago = FormasPago::all()->sortBy('nombre', SORT_NATURAL | SORT_FLAG_CASE)->pluck('nombre', 'id');
      return view('compras/compra/editar_compra', compact('compra', 'tiposCompras', 'formasPago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $idCompra)
    {
      $data = request()->validate([
        'id_tipo_compra' => 'required|numeric',
        'id_forma_pago'  => 'required|numeric',
        'editarScanner'        => 'file',
        'descripcion'    => 'required',
      ]);
      if ($request->ajax()) {
        // Si el usuario cambia el archivo
        if($request->hasFile('editarScanner')){
          // aquí compruebo que exista el archivo anterior
          if (\Storage::exists($idCompra->scanner))
          {
            // aquí la borro
            \Storage::delete($idCompra->scanner);
          }
          $idCompra->scanner=\Storage::putFile('public/scannerCompra', $request->file('editarScanner'));
        }
        $idCompra->update($request->all());
        return response()->json([
          "mensaje" => "Compra actualizada correctamente."
        ]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $idCompra)
    {
      $idCompra->delete();
      return response()->json([
        "mensaje" => "Compra eliminada correctamente."
      ]);
    }
}
