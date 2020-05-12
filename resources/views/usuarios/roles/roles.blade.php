@extends('layouts.app')
@section('titulo')
Roles
@endsection
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
        <h1 class="m-0 text-dark"><i class="fas fa-user-tag"></i> Roles</h1>
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
@can('crear.rol')
{{-- Modal para registro de un nuevo rol --}}
<div class="modal fade" id="modal-crear">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fas fa-plus"></i> Registrar un Rol</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        {{ Form::open(['id' => 'frm_crear_rol']) }}
            @include('usuarios.roles.form.formulario')
        {{ Form::close() }}
    </div>
  </div>
</div>
@endcan

@can('editar.rol')
{{-- Modal para Editar un rol --}}
<div class="modal fade" id="modal-editar" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fa fa-pen"></i> Editar nombre del Rol</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="formulario">

      </div>
    </div>
  </div>
</div>
@endcan

@can('eliminar.rol')
{{-- Modal para Eliminar un rol --}}
<div class="modal fade" id="modal-eliminar" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title"><i class="fa fa-trash"></i> Eliminar Rol</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">
          <h3 class="text-center">¿Esta seguro de eliminar el rol <span id="nombreDeRol"></span>?</h3>
          <input id="idRolEliminar" class="form-control" type="hidden" required>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" type="button" data-dismiss="modal">Cancelar</button>
          <button id="eliminarRol" class="btn btn-danger" type="submit">Eliminar </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan

<div class="content">
  <div id="listarRoles">

  </div>
</div>
@endsection
@section('script_ajax')
<script src="/js/rol_ajax.js" type="text/javascript"></script>
<!-- Page script -->
<script>
  $(function () {
    // Seleccionar todos los selectores del usuario al crear
    $('#switch1').change(function() {
      $('#todoUsuario > div > input').prop('checked', $(this).is(':checked'));
      $('#color1').toggleClass('card-info card-success');
    });

    // Seleccionar todos los selectores de ubicación al crear
    $('#switch2').change(function() {
      $('#todoUbicacion > div > input').prop('checked', $(this).is(':checked'));
      $('#color2').toggleClass('card-info card-success');
    });
  });

</script>
@endsection
