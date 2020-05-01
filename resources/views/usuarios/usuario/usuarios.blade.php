@extends('layouts.app')
@section('menu-open')
menu-open
@endsection
@section('active2')
active
@endsection
@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-user-friends"></i> Usuarios</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="home">Inicio</a></li>
          <li class="breadcrumb-item"><a href="usuarios">usuarios</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

@can('crear.usuario')
{{-- Modal para registro de un nuevo usuario --}}
<div class="modal fade" id="modal-crear" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fas fa-plus"></i> Registro de usuario</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">          
          <div class="form-group">
            <label for="nombreUsuario">Nombre del usuario: </label>
            <input id="nombreUsuario" class="form-control focus" type="text" placeholder="Nombre del usuario" required="">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" type="button" data-dismiss="modal">Cerrar</button>
          <button id="crearUsuario" class="btn btn-info" type="submit">Crear usuario </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan

@can('editar.usuario')
{{-- Modal para Editar un Usuario --}}
<div id="modal-editar" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fa fa-pen"></i> Editar usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">
          <div class="form-group">
            <label for="editarUsuario">Editar el nombre de usuario: </label>
            <input id="idUsuario" class="form-control" type="hidden" required="">
            <input id="editarUsuario" class="form-control focus" type="text" required="">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" type="button" data-dismiss="modal">Cerrar</button>
          <button id="editUsuario" class="btn btn-info" type="submit" >Editar usuario </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan

@can('eliminar.usuario')
{{-- Modal para Eliminar un Usuario --}}
<div class="modal fade" id="modal-eliminar" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title"><i class="fa fa-trash"></i> Eliminar usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form method="POST" id="frmEliminarUsuario" name="frmEliminarUsuario">
        <div class="modal-body">
          <h3 class="text-center">¿Esta seguro de eliminar el usuario <span id="nombreDeUsuario"></span>?</h3>
          <input id="idUsuarioEliminar" class="form-control" type="hidden" required="">
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" type="button" data-dismiss="modal">Cancelar</button>
          <button id="eliminarUsuario" class="btn btn-danger" type="submit">Eliminar </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan

<div class="content">
  <div id="listarUsuarios">

  </div>
</div>

@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/usuario_ajax.js"></script>
@endsection