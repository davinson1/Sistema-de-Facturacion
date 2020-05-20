@extends('layouts.app')
@section('titulo')
Porcentaje
@endsection
@section('menu-open2')
menu-open
@endsection
@section('active12')
active
@endsection
@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-percentage"></i> Porcentaje</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">Porcentaje</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

@include("productos.porcentaje.crear_porcentaje")
@include("productos.porcentaje.editar_porcentaje")
@include("productos.porcentaje.eliminar_porcentaje")

<!-- /.content-header -->
<div class="content">
  <div id="listarprocentajes">

  </div>
</div>

@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/procentaje_ajax.js"></script>
@endsection