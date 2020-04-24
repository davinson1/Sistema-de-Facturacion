@extends('layouts.app')
@section('menu-open')
menu-open
@endsection
@section('active5')
active
@endsection
@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-id-card"></i> Tipo de documentos</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">Tipo documento</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

{{-- Modal para registro de un nuevo tipo de documento --}}
<div class="modal fade" id="modal-crear" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fas fa-plus"></i> Registrar un Tipo documento</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">
          <div class="form-group">
            <label for="nombreTipo">Nombre del tipo de documento: </label>
            <input id="nombreTipo" class="form-control focus" type="text" placeholder="Nombre tipo documento" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button id="tipoDocumento" class="btn btn-info" type="submit">Crear Tipo </button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Modal para Editar un tipo de documento --}}
<div class="modal fade" id="modal-editar" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fa fa-pen"></i> Editar nombre tipo documento</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">
          <div class="form-group">
            <label for="editarTipo">Editar el tipo de documento: </label>
            <input id="idTipoDocumento" class="form-control" type="hidden" required="">
            <input id="editarTipo" class="form-control focus" type="text" required="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button id="editarElTipo" class="btn btn-primary" type="submit">Editar Tipo </button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Modal para Eliminar un tipo de documento --}}
<div class="modal fade" id="modal-eliminar" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title"><i class="fa fa-trash"></i> Eliminar Tipo documento</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">
          <h3 class="text-center">¿Esta seguro de eliminar el Tipo de documento <span id="nombreDeTipo"></span>?</h3>
          <input id="idTipoEliminar" class="form-control" type="hidden" required="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" id="eliminarTipo" class="btn btn-danger">Eliminar </button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="content">
  <div id="listarTipoDocumento">

  </div>
</div>

@endsection
@section('script_ajax')
<script type="text/javascript" src="/js/tipo_documento_ajax.js"></script>
@endsection