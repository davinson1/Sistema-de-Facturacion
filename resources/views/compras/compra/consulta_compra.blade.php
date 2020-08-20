@extends('layouts.app')
@section('titulo')
Artículos compras
@endsection
@section('menu-open-compras')
menu-open
@endsection
@section('active-consulta-compras')
active
@endsection
@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-shopping-bag"></i> Historia del compras</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">Historia del compras</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<div class="content">
  <div id="listarCompras">

  </div>
</div>

@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/compras/consulta_compras_ajax.js"></script>
@endsection
