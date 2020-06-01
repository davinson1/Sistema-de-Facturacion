@extends('layouts.app')
@section('titulo')
Formas de pago
@endsection
@section('menu-open-producto')
menu-open
@endsection
@section('active-forma-pago')
active
@endsection
@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-cash-register"></i> Formas de pago</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">Formas de pago</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

@can('crear.formas.pagos')
  {{-- Modal para registro de formas de pago --}}
  <div class="modal fade" id="modal-crear" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title"><i class="fas fa-plus"></i> Registrar una formas de pago</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        @csrf
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label for="nombreFormaPago">Nombre formas de pago:</label>
              <input id="nombreFormaPago" class="form-control focus" type="text" placeholder="Nombre formas de pago" required="">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" id="crearFormaPago" class="btn btn-info">Crear formas de pago </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endcan

@can('editar.formas.pagos')
  {{-- Modal para Editar un formas de pago --}}
  <div class="modal fade" id="modal-editar" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title"><i class="fa fa-pen"></i> Editar formas de pago</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        @csrf
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label for="idFormaPago">Nombre formas de pago:</label>
              <input id="idFormaPago" class="form-control" type="hidden" required="">
              <input id="editarFormaPago" class="form-control focus" type="text" required="">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" id="editarLaFormaPago" class="btn btn-info">Editar forma pago </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endcan

@can('eliminar.formas.pagos')
  {{-- Modal para Eliminar un formas de pago --}}
  <div class="modal fade" id="modal-eliminar" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h4 class="modal-title"><i class="fa fa-trash"></i> Eliminar formas de pago</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        @csrf
        <form>
          <div class="modal-body">
            <h3 class="text-center">¿Esta seguro de eliminar la formas de pago <span id="nombreDeFormaPago"></span>?</h3>
            <input id="idFormaPagoEliminar" class="form-control" type="hidden" required="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button id="eliminarFormaPago" class="btn btn-danger" type="submit">Eliminar </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endcan

<div class="content">
  <div id="listarFormaPago">
    
  </div>
</div>

@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/productos/forma_pago_ajax.js"></script>
@endsection