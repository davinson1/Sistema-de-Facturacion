@extends('layouts.app')
@section('titulo')
Empresa
@endsection
@section('menu-open-usuario')
menu-open
@endsection
@section('active-empresa')
active
@endsection
@section('contenido')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-building"></i> Empresa
        </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="home">Inicio</a></li>
          <li class="breadcrumb-item"><a href="usuarios">Empresa</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="content">
  <div id="ListarEmpresas">
    <h1>Hola empresa</h1>
  </div>
</div>

@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/usuarios/empresa_ajax.js"></script>
@endsection