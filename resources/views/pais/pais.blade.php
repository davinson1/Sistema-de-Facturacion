@extends('layouts.app')
@section('menu-open1')
menu-open
@endsection
@section('active6')
active
@endsection
@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">País</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">País</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

{{-- Modal para registro de un nuevo rol --}}
<div class="modal fade" id="modal-crear-pais" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fas fa-plus"></i> Registrar un País</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form method="POST" id="frm_crear_pais" name="frm_crear_pais" action="{{ url('pais_crear') }}" >
        <div class="modal-body">
          <input type="text" name="nombre_pais" id="nombre_pais" class="form-control" placeholder="Nombre del país" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button"  id="crear_pais" type="submit" class="btn btn-info">Crear País </button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Modal para Editar un rol --}}
<div class="modal fade" id="modal-editar-pais" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fa fa-pen"></i> Editar País</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form method="POST" id="frm_editar_pais" name="frm_editar_pais" action="{{ url('pais_editar') }}" >
        <div class="modal-body">
          <input type="hidden" name="id_pais" id="id_pais" class="form-control" required>
          <input type="text" name="editar_pais" id="editar_pais" class="form-control" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" id="edit_pais" type="submit" class="btn btn-info">Editar País </button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Modal para Eliminar un rol --}}
<div class="modal fade" id="modal-eliminar-pais" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title" id="modal-title"><i class="fa fa-trash"></i> Eliminar País</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form method="POST" id="frm_eliminar_pais" name="frm_eliminar_pais" action="{{ url('pais_eliminar') }}" >
        <div class="modal-body">
          <h3 class="text-center">¿Esta seguro de eliminar el País <span id="nombre_de_pais"></span>?</h3>
          <input type="hidden" name="id_pais_eliminar" id="id_pais_eliminar" class="form-control" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="button"  id="eliminar_pais" type="submit" class="btn btn-danger">Eliminar </button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="content">
<div id="lista-paises">
</div>
</div>

@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/pais_ajax.js"></script>
@endsection