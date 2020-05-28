@extends('layouts.app')
@section('titulo')
Proveedor
@endsection
@section('menu-open2')
menu-open
@endsection
@section('active16')
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

@can('crear.proveedores')
{{-- Modal para registro de tipo de factura --}}
<div class="modal fade" id="modal-crear" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fas fa-plus"></i> Registrar un proveedor</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">
          <div class="form-group">
            <label for="nombreProveedor">Nombre:</label>
            <input id="nombreProveedor" class="form-control focus" type="text" placeholder="Nombre del proveedor" required="">
          </div>
          <div class="form-group">
            <label for="telefonoProveedor">Teléfono:</label>
            <input id="telefonoProveedor" class="form-control focus" type="text" placeholder="Teléfono del proveedor" required="">
          </div>
          <div class="form-group">
            <label for="descripcionProveedor">Descripción del proveedor:</label>
            <input id="descripcionProveedor" class="form-control focus" type="text" placeholder="Descripcion del proveedor" required="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="crearProveedor" class="btn btn-info">Crear proveedor </button>
        </div>
      </form>
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