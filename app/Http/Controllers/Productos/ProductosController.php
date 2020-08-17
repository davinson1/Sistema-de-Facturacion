<?php

namespace App\Http\Controllers\Productos;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\TipoArticulo;
use App\Models\Proveedor;
use App\Models\Porcentaje;
use App\Models\CategoriaProductos;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tipoArticulos = TipoArticulo::all();
      $proveedores = Proveedor::all();
      $porcentajes = Porcentaje::all();
      $categoriasp = CategoriaProductos::all();
      return view('productos/producto/productos', compact('tipoArticulos', 'proveedores', 'porcentajes','categoriasp'));
    }

    public function listarProductos()
    {
      $productos = Producto::all();
      return view('productos/producto/tabla_productos', compact('productos'));
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
        'fotoProducto'            => 'image',
        'tipoArticulo'            => 'required|numeric',
        'tipoProveedor'           => 'required|numeric',
        'tipoPorcentaje'          => 'required|numeric',
        'idCategoria'              => 'required|numeric',
        'nombreProducto'          => 'required|min:3|unique:productos,nombre',
        'codigoBarrasProducto'    => 'required',
        'descripcionProducto'     => 'required',
      ]);

      if ($request->ajax()) {

        if ($request->fotoProducto==null) {
          $foto = '';
        }else{
          $foto = $request->file('fotoProducto')->store('public/fotosProductos');
        }

        $producto = new Producto();
        $producto->id_tipo_articulo = $request->tipoArticulo;
        $producto->id_proveedor = $request->tipoProveedor;
        $producto->id_categoria = $request->idCategoria;
        $producto->id_porcentaje = $request->tipoPorcentaje;
        $producto->nombre = $request->nombreProducto;
        $producto->codigo_barras = $request->codigoBarrasProducto;
        $producto->foto = str_replace("public/","storage/",$foto);
        $producto->especificaciones = $request->descripcionProducto;
        $producto->save();


        return response()->json([
          "mensaje" => "Producto creado correctamente."
        ]);
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
      $tipoArticulos = TipoArticulo::all()->sortBy('nombre', SORT_NATURAL | SORT_FLAG_CASE)->pluck('nombre', 'id');
      $proveedores = Proveedor::all()->sortBy('nombre', SORT_NATURAL | SORT_FLAG_CASE)->pluck('nombre', 'id');
      $categoriasp = CategoriaProductos::all()->sortBy('nombre', SORT_NATURAL | SORT_FLAG_CASE)->pluck('nombre', 'id');
      $porcentajes = Porcentaje::all()->sortBy('nombre', SORT_NATURAL | SORT_FLAG_CASE)->pluck('nombre', 'id');
      return view('productos/producto/editar_producto', compact('producto', 'tipoArticulos', 'proveedores', 'categoriasp','porcentajes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $idProducto)
    {
      $data = request()->validate([
        'fotoProducto'     => 'image',
        'id_tipo_articulo' => 'required|numeric',
        'id_proveedor'     => 'required|numeric',
        'id_categoria'     => 'required|numeric',
        'id_porcentaje'    => 'required|numeric',
        'nombre'           => 'required|min:3|unique:productos,nombre,'.$idProducto->id,
        'valor_venta'      => 'required|numeric',
        'porcentaje_minimo'=> 'required',
        'codigo_barras'    => 'required',
        'especificaciones' => 'required',

      ]);
      if ($request->ajax()) {
        // Si el usuario cambia la foto
        if($request->hasFile('fotoProducto')){
          // aquí compruebo que exista la foto anterior
          if (\Storage::exists($idProducto->foto))
          {
               // aquí la borro
               \Storage::delete($idProducto->foto);
          }
          $idProducto->foto=\Storage::putFile('public/fotosProductos', $request->file('fotoProducto'));
        }
        $idProducto->update($request->all());
        return response()->json([
          "mensaje" => "Producto actualizado correctamente."
        ]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $idProducto)
    {
      $idProducto->delete();
      return response()->json([
        "mensaje" => "Producto eliminado correctamente."
      ]);
    }
}
