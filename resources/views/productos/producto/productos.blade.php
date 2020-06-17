@extends('layouts.app')
@section('titulo')
Productos
@endsection
@section('menu-open-producto')
menu-open
@endsection
@section('active-articulo')
active
@endsection
@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-shopping-basket"></i> Productos</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">Productos</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

@include("productos.producto.crear_producto")

@can('editar.productos')
{{-- Modal para editar un tipo tributario --}}
<div class="modal fade" id="modal-editar" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fa fa-trash"></i> Editar producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="formulario">
          
        </div>
      </div>      
    </div>
  </div>
</div>
@endcan

@can('eliminar.productos')
{{-- Modal para Eliminar un producto --}}
<div class="modal fade" id="modal-eliminar" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title"><i class="fa fa-trash"></i> Eliminar producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">
          <h3 class="text-center">¿Esta seguro de eliminar el producto <span id="nombreDelProducto"></span>?</h3>          
          <img id="imgProducto" src="/img/social.png" class="mb-3 rounded mx-auto d-block " alt="Foto del producto" width="100" height="100"> 
          <input id="idProductoEliminar" class="form-control" type="hidden" required="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button id="eliminarProducto" class="btn btn-danger" type="submit">Eliminar </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan

<div class="content">
  <div id="listarProductos">
    
  </div>
</div>

@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/productos/productos_ajax.js"></script>
@endsection