@extends('layouts.app')
@section('titulo')
Tipos de compras
@endsection
@section('menu-open-compras')
menu-open
@endsection
@section('active-tipo-compra')
active
@endsection
@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-store-alt"></i> Tipos de compras</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">Tipos de compras</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="content">
  <div id="listarTipoCompra">
    <h1>Vista tipo de compra</h1>
  </div>
</div>

@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/productos/tipo_compra_ajax.js"></script>
@endsection