@extends('layouts.app')
@section('titulo')
Tipos de facturas
@endsection
@section('menu-open-producto')
menu-open
@endsection
@section('active-tipo-factura')
active
@endsection
@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-receipt"></i> Tipos de facturas</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">Tipos de facturas</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

@can('crear.tipos.facturas')
{{-- Modal para registro de tipo de factura --}}
<div class="modal fade" id="modal-crear" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fas fa-plus"></i> Registrar un tipo de factura</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">
          <div class="form-group">
            <label for="nombreTipoFactura">Nombre tipo de factura:</label>
            <input id="nombreTipoFactura" class="form-control focus" type="text" placeholder="Nombre tipo de factura" required="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="crearTipoFactura" class="btn btn-info">Crear tipo de factura </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan

@can('editar.tipos.facturas')
{{-- Modal para Editar un tipo de factura --}}
<div class="modal fade" id="modal-editar" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fa fa-pen"></i> Editar tipo de factura</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">
          <div class="form-group">
            <label for="idTipoFactura">Nombre tipo de factura:</label>
            <input id="idTipoFactura" class="form-control" type="hidden" required="">
            <input id="editarTipoFactura" class="form-control focus" type="text" required="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="editarElTipoFactura" class="btn btn-info">Editar tipo factura </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan

@can('eliminar.tipos.facturas')
{{-- Modal para Eliminar un tipo de factura --}}
<div class="modal fade" id="modal-eliminar" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title"><i class="fa fa-trash"></i> Eliminar tipo de factura</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">
          <h3 class="text-center">¿Esta seguro de eliminar el tipo de factura <span id="nombreTipoFactura"></span>?</h3>
          <input id="idTipoFacturaEliminar" class="form-control" type="hidden" required="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button id="eliminarTipoFactura" class="btn btn-danger" type="submit">Eliminar </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan

<div class="content">
  <div id="listarTiposFacturas">
    
  </div>
</div>

@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/productos/tipo_factura_ajax.js"></script>
@endsection