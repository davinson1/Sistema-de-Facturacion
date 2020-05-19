@extends('layouts.app')
@section('titulo')
Tipos tributarios
@endsection
@section('menu-open2')
menu-open
@endsection
@section('active15')
active
@endsection
@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-gavel"></i> Tipos tributarios</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">Tipos tributarios</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

@can('crear.tipos.tributario')
{{-- Modal para registro de tipo tributario --}}
<div class="modal fade" id="modal-crear" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fas fa-plus"></i> Registrar un tipo tributario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">
          <div class="form-group">
            <label for="nombreTipoTributario">Nombre tipo tributario:</label>
            <input id="nombreTipoTributario" class="form-control focus" type="text" placeholder="Nombre tipo tributario" required="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="crearTipoTributario" class="btn btn-info">Crear tipo tributario </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan

@can('editar.tipos.tributario')
{{-- Modal para Editar un tipo tributario --}}
<div class="modal fade" id="modal-editar" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fa fa-pen"></i> Editar tipo tributario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">
          <div class="form-group">
            <label for="idTipoTributario">Nombre tipo tributario:</label>
            <input id="idTipoTributario" class="form-control" type="hidden" required="">
            <input id="editarTipoTributario" class="form-control focus" type="text" required="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="editarElTipoTributario" class="btn btn-info">Editar tipo tributario </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan

@can('eliminar.tipos.tributario')
{{-- Modal para Eliminar un tipo tributario --}}
<div class="modal fade" id="modal-eliminar" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title"><i class="fa fa-trash"></i> Eliminar tipo tributario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">
          <h3 class="text-center">¿Esta seguro de eliminar el tipo tributario <span id="nombreTipoTributario"></span>?</h3>
          <input id="idTipoTributarioEliminar" class="form-control" type="hidden" required="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button id="eliminarTipoTributario" class="btn btn-danger" type="submit">Eliminar </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan

<div class="content">
  <div id="listarTipoTributario">
    
  </div>
</div>

@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/tipo_tributario_ajax.js"></script>
@endsection