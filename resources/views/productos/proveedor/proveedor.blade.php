@extends('layouts.app')
@section('titulo')
Proveedor
@endsection
@section('menu-open-producto')
menu-open
@endsection
@section('active-proveedor')
active
@endsection
@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-truck"></i> Proveedor</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">Proveedor</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

@include("productos.Proveedor.crear_proveedor")
@include("productos.Proveedor.eliminar_proveedor")
{{-- @include("productos.Proveedor.editar_proveedor") --}}

@can('editar.proveedores')
{{-- Modal para registro de proveedor --}}
<div class="modal fade" id="modal-editar" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fas fa-plus"></i> editar un proveedor</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

<div id="formularioeditar">


</div>
    </div>
  </div>
</div>
@endcan
<div class="content">
  <div id="listarProvedor">

  </div>
</div>

@endsection

@section('script_ajax')
<script  type="text/javascript" src="/js/productos/proveedor_ajax.js"></script>
@endsection