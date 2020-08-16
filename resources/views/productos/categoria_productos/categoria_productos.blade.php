@extends('layouts.app')
@section('titulo')
Categorias de productos
@endsection
@section('menu-open-producto')
menu-open
@endsection
@section('active-categoriaproductos')
active
@endsection
@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-shopping-cart"></i> Categoría de productos</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">Categoría de productos</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

@include("productos.categoria_productos.crear_categorias")
@include("productos.categoria_productos.editar_categoriasp")
@include("productos.categoria_productos.eliminar_categoriasp")

<!-- /.content-header -->
<div class="content">
  <div id="listarcategoriaproductos">

  </div>
</div>

@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/productos/categoriaproductos_ajax.js"></script>
@endsection
