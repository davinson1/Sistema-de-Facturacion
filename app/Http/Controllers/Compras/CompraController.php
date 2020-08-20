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
use App\Models\Iva;
use App\Models\ArticuloCompra;
use App\Models\HistoricoPreciosProductos;




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

    public function indexconsultacompras() {
        return view('compras/compra/consulta_compra');

    }

    public function listarComprasr(){
      $compras = Compra::all();
      return view('compras/compra/tabla_consulta_compras', compact('compras'));
    }

    public function buscarProducto() {
        $productos = Producto::all();
        return response()->json($productos);
    }

    public function guardarCompraTemporal(Request $request){
      $data = request()->validate([
          'nombre'          => 'required|min:3|max:100|unique:compra_temporal,nombre_producto,NULL,id,token_usuario,'.Auth()->user()->remember_token,
          'precio_compra'   => 'required|numeric',
          'cantidad_compra' => 'required|numeric',
        ],
        [
          'nombre.unique'=>'El producto '.'<strong>'.$request->nombre.'</strong>'.' ya esta agregado.',
          'precio_compra.required'=>'El campo precio de compra es obligatorio.',
          'cantidad_compra.required'=>'El campo cantidad de compra es obligatorio.'
        ]
      );

      if ($request->ajax())
      {
        $temporal = new CompraTemporal();
        $temporal->token_usuario = Auth()->user()->remember_token;
        $temporal->nombre_producto = $request->nombre;
        $temporal->foto = $request->foto;
        $temporal->cantidad_producto = $request->cantidad_compra;
        $temporal->precio_compra = $request->precio_compra;
        $temporal->precio_venta = $request->precio_venta;
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
      $compraTemporal = CompraTemporal::where('token_usuario', Auth()->user()->remember_token)->get();
      return view('compras/compra/tabla_compra', compact('compraTemporal'));
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
        'idProveedor'      => 'required|numeric',
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
        // Almacenar en la tabla compra
        $compra = new Compra();
        $compra->id_tipo_compra = $request->idTipoCompra;
        $compra->id_usuario     = Auth()->user()->id;
        $compra->id_forma_pago  = $request->idFormaPago;
        $compra->id_proveedor   = $request->idProveedor;
        $compra->scanner        = $scanner;
        $compra->total_compra    = $request->totalCompra;
        $compra->descripcion    = $request->descripcionCompra;
        $compra->save();
        // Almacenar en la tabla articulo_compra
        if (CompraTemporal::where('token_usuario', Auth()->user()->remember_token)->exists()) {

          $getCompraTemporal = CompraTemporal::where('token_usuario', Auth()->user()->remember_token)->get();
          foreach ($getCompraTemporal as $compraTemporal) {
            $articuloCompra               = new ArticuloCompra();
            $articuloCompra->id_productos = $compraTemporal->id_producto;
            $articuloCompra->id_compra    = $compra->id;
            $articuloCompra->cantidad     = $compraTemporal->cantidad_producto;
            $articuloCompra->valor_compra = $compraTemporal->precio_compra;
            $articuloCompra->save();
            //Almacenar el precio de venta a cada producto
            Producto::where('id', $compraTemporal->id_producto)
            ->increment('cantidad', $compraTemporal->cantidad_producto,[ 'valor_venta' => $compraTemporal->precio_venta]);
            //Almacenar Historico de precios
            $historicoPrecio = new HistoricoPreciosProductos();
            $historicoPrecio->id_producto = $compraTemporal->id_producto;
            $historicoPrecio->valor_venta = $compraTemporal->precio_venta;
            $historicoPrecio->valor_compra = $request->totalCompra;
            $historicoPrecio->save();

          }
          // Eliminar la tabla temporal
          CompraTemporal::where('token_usuario', Auth()->user()->remember_token)->delete();
          return response()->json([
            "mensaje" => "Compra creada correctamente."
          ]);
        }else{
          request()->validate([
            'name' => 'required',
          ], ['name.required' => 'No hay productos agregados.']);
        }
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

    public function anularCompra()
    {
      CompraTemporal::where('token_usuario', Auth()->user()->remember_token)->delete();
      return response()->json([
        "mensaje" => "Compra anulada correctamente."
      ]);
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
