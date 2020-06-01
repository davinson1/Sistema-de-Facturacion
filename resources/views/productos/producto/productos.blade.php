@extends('layouts.app')
@section('titulo')
Productos
@endsection
@section('menu-open-producto')
menu-open
@endsection
@section('active-producto')
active
@endsection
@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-shopping-cart"></i> Productos</h1>
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
@include("productos.producto.editar_producto")
@include("productos.producto.eliminar_producto")

<div class="content">
  <div id="listaproductos">

  </div>
</div>

@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/productos/productos_ajax.js"></script>
@endsection