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

 <!-- /.card -->
<div class="content">
  <div class="card">
    <div class="card-header ">
      <h3 class="card-title">Listado de usuarios</h3>
      @can('crear.usuario')
      <!--modal de boton registar usuario-->
      <button id="modalCrearUsuario" type="button" class="btn btn-info float-right">
        <i class="fas fa-plus"></i>
        Crear usuario
      </button>
     <!--fin modal de boton registar usuario-->
     @endcan
    </div>
    <div class="card-body">
      <div id="listarUsuarios">
        <table id="tabla-usuario" class="table table-bordered table-striped">
          <thead class="bg-info">
          <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Documento</th>
            <th>Correo</th>
            <th>Dirección</th>
            <th>Fecha de Creación</th>
            <th>Acciones</th>
          </tr>
          </thead>
          <tbody>
            <tr>
            @foreach ($usuario as $usuarios)
              <td>{{ $usuarios->id }}</td>
              <td>{{ $usuarios->name }} {{ $usuarios->apellido }}</td>
              <td>{{ $usuarios->numero_documento }}</td>
              <td>{{ $usuarios->email }}</td>
              <td>{{ $usuarios->direccion }}</td>
              <td>{{ $usuarios->updated_at }}</td>
              <td>
                @can('editar.usuario')
                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-editar" onclick="Editar('{{$usuarios->id}}','{{$usuarios->name}}')">
                  <i class="fa fa-pen"></i>
                </button>
                @endcan
                @can('eliminar.usuario')
                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-eliminar" onclick="Eliminar('{{$usuarios->id}}','{{$usuarios->name}}')">
                  <i class="fa fa-times"></i>
                </button>
                @endcan
               </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/usuario_ajax.js"></script>
@endsection