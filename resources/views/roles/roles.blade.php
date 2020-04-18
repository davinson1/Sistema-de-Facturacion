@extends('layouts.app')
@section('menu-open')
menu-open
@endsection
@section('active3')
active
@endsection
@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Roles</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">Roles</a></li>
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
        <h4 class="modal-title"><i class="fas fa-plus"></i> Registrar un Rol</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form method="POST" id="frm_roles" name="frm_roles" action="{{ url('roles') }}" >
        <div class="modal-body">
          <input type="text" name="nom_rol" id="nom_rol" class="form-control" placeholder="Nombre del rol" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button"  id="roles" type="submit" class="btn btn-info">Crear Rol </button>
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
        <h4 class="modal-title"><i class="fa fa-pen"></i> Editar nombre del Rol</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form method="POST" id="frm_roles" name="frm_roles" action="{{ url('roles_editar') }}" >
        <div class="modal-body">
          <input type="hidden" name="id_rol" id="id_rol" class="form-control" required>
          <input type="text" name="editar_rol" id="editar_rol" class="form-control" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button"  id="edit_rol" type="submit" class="btn btn-primary">Editar Rol </button>
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
        <h4 class="modal-title" id="modal-title"><i class="fa fa-trash"></i> Eliminar Rol</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form method="POST" id="frm_roles" name="frm_roles" action="{{ url('roles_eliminar') }}" >
        <div class="modal-body">
          <h3 class="text-center">¿Esta seguro de eliminar el Rol?</h3>
          <input type="hidden" name="id_rol_eliminar" id="id_rol_eliminar" class="form-control" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="button"  id="eliminar_rol" type="submit" class="btn btn-danger">Eliminar </button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="content">
<div id="list-roles">
</div>
</div>

@endsection
@section('script_ajax')
<script src="/js/rol_ajax.js" type="text/javascript"></script>
@endsection