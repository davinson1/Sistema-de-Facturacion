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
        <h1 class="m-0 text-dark">Usuarios</h1>
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

{{-- Modal para registro de un nuevo usuario --}}
<div class="modal fade" id="modal-crear-usuario" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fas fa-plus"></i> Registro de usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form method="POST" id="frmCrearUsuario" name="frmCrearUsuario">
        <div class="modal-body">
          
          <div class="form-group">
            <label for="nombreUsuario">Nombre del usuario</label>
            <input type="text" name="nombreUsuario" id="nombreUsuario" class="form-control" placeholder="Nombre del usuario" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="crearUsuario" class="btn btn-info">Crear usuario </button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Modal para Editar un Usuario --}}
<div class="modal fade" id="modal-editar-usuario" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fa fa-pen"></i> Editar usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form method="POST" id="frmEditarUsuario" name="frmEditarUsuario">
        <div class="modal-body">
          <input type="hidden" name="idUsuario" id="idUsuario" class="form-control" required>
          <input type="text" name="editarUsuario" id="editarUsuario" class="form-control" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="editUsuario" class="btn btn-info">Editar usuario </button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Modal para Eliminar un Usuario --}}
<div class="modal fade" id="modal-eliminar-usuario" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title" id="modal-title"><i class="fa fa-trash"></i> Eliminar usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form method="POST" id="frmEliminarUsuario" name="frmEliminarUsuario">
        <div class="modal-body">
          <h3 class="text-center">¿Esta seguro de eliminar el usuario <span id="nombreDeUsuario"></span>?</h3>
          <input type="hidden" name="idUsuarioEliminar" id="idUsuarioEliminar" class="form-control" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit"  id="eliminarUsuario" class="btn btn-danger">Eliminar </button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="content">
  <div id="listarUsuarios">

  </div>
</div>

@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/usuario_ajax.js"></script>
@endsection