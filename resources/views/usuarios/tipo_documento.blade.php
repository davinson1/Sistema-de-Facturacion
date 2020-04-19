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
        <h1 class="m-0 text-dark">Tipo Documento</h1>
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

{{-- Modal para registro de un nuevo rol --}}
<div class="modal fade" id="modal-default" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fas fa-plus"></i> Registrar un Tipo documento</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form method="POST" id="frm_tipo_documento" name="frm_tipo_documento">
        <div class="modal-body">
          <input type="text" name="nombre_tipo" id="nombre_tipo" class="form-control" placeholder="Nombre tipo documento" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button"  id="tipo_documento" type="submit" class="btn btn-info">Crear Tipo </button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Modal para Editar un rol --}}
<div class="modal fade" id="modal-editar" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fa fa-pen"></i> Editar nombre tipo documento</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form method="POST" id="frm_tipo_documento" name="frm_tipo_documento">
        <div class="modal-body">
          <input type="hidden" name="id_tipo_documento" id="id_tipo_documento" class="form-control" required>
          <input type="text" name="editar_tipo" id="editar_tipo" class="form-control" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button"  id="edit_tipo" type="submit" class="btn btn-primary">Editar Tipo </button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Modal para Eliminar un rol --}}
<div class="modal fade" id="modal-eliminar" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title" id="modal-title"><i class="fa fa-trash"></i> Eliminar Tipo documento</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form method="POST" id="frm_tipo_documento" name="frm_tipo_documento" action="{{ url('roles_eliminar') }}" >
        <div class="modal-body">
          <h3 class="text-center">¿Esta seguro de eliminar el Rol?</h3>
          <input type="hidden" name="id_tipo_eliminar" id="id_tipo_eliminar" class="form-control" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="button"  id="eliminar_tipo" type="submit" class="btn btn-danger">Eliminar </button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="content">
  <div id="listar-tipos-documentos">

  </div>
</div>

@endsection
@section('script_ajax')
<script type="text/javascript" src="/js/tipo_documento_ajax.js"></script>
@endsection