@extends('layouts.app')
@section('titulo')
Tipo articulo
@endsection
@section('menu-open-producto')
menu-open
@endsection
@section('active-tipo-articulo')
active
@endsection
@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-shopping-basket"></i> Tipo articulo</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">Tipo articulo</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->


 @include("productos.tipo_articulo.crear_tparticulo")
@include("productos.tipo_articulo.editar_tparticulo")
  @include("productos.tipo_articulo.eliminar_tparticulo")









<!-- /.content-header -->
<div class="content">
  <div id="listartipoarticulo">

  </div>
</div>

@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/productos/tipo_articulo_ajax.js"></script>
@endsection