@extends('layouts.app')
@section('titulo')
Iva
@endsection
@section('menu-open-producto')
menu-open
@endsection
@section('active-iva')
active
@endsection
@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-file-invoice-dollar"></i> Iva</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">Iva</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

@can('crear.iva')
  {{-- Modal para registro de iva --}}
  <div class="modal fade" id="modal-crear" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title"><i class="fas fa-plus"></i> Registrar iva</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        @csrf
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label for="valorIva">Valor de iva:</label>
              <input id="valorIva" class="form-control focus" type="text" placeholder="Valor del iva" required="">
            </div>
            <div class="form-group">
              <label for="fechaFinIva">Fecha fin:</label>
              <input id="fechaFinIva" class="form-control" type="date" placeholder="Fecha final de iva" required="" min="{{ date('Y-m-d') }}">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" id="crearIva" class="btn btn-info">Crear iva </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endcan

@can('editar.iva')
  {{-- Modal para Editar iva --}}
  <div class="modal fade" id="modal-editar" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title"><i class="fa fa-pen"></i> Editar iva</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        @csrf
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label for="idIva">Valor iva:</label>
              <input id="idIva" class="form-control" type="hidden" required="">
              <input id="editarIva" class="form-control focus" type="text" required="">
            </div>
            <div class="form-group">
              <label for="editarFechaFinIva">Fecha fin:</label>
              <input id="editarFechaFinIva" class="form-control focus" type="date" placeholder="Fecha final de iva" required="" min="{{ date('Y-m-d') }}">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" id="editarElIva" class="btn btn-info">Editar iva </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endcan

@can('eliminar.iva')
  {{-- Modal para Eliminar un iva --}}
  <div class="modal fade" id="modal-eliminar" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h4 class="modal-title"><i class="fa fa-trash"></i> Eliminar iva</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        @csrf
        <form>
          <div class="modal-body">
            <h3 class="text-center">¿Esta seguro de eliminar el iva con valor <span id="valorDelIva"></span> %?</h3>
            <input id="idIvaEliminar" class="form-control" type="hidden" required="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button id="eliminarIva" class="btn btn-danger" type="submit">Eliminar </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endcan

<div class="content">
  <div id="listarIva">
    
  </div>
</div>

@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/productos/iva_ajax.js"></script>
@endsection