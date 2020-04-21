@extends('layouts.app')
@section('menu-open1')
menu-open
@endsection
@section('active8')
active
@endsection
@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Municipios</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">municipios</a></li>
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
        <h4 class="modal-title"><i class="fas fa-plus"></i> Registrar un municipio</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form method="POST" id="frmCrearMunicipio" name="frmCrearMunicipio">
        <div class="modal-body">
          <input type="text" name="nombreMunicipio" id="nombreMunicipio" class="form-control" placeholder="Nombre del municipio" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="crearMunicipio" class="btn btn-info">Crear País </button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Modal para Editar un rol --}}
<div class="modal fade" id="modal-editar-municipio" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fa fa-pen"></i> Editar municipio</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form method="POST" id="frmEditarMunicipio" name="frmEditarMunicipio">
        <div class="modal-body">
          <input type="hidden" name="idMunicipio" id="idMunicipio" class="form-control" required>
          <input type="text" name="editarMunicipio" id="editarMunicipio" class="form-control" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="editMunicipio" class="btn btn-info">Editar municipio </button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Modal para Eliminar un municipio --}}
<div class="modal fade" id="modal-eliminar-municipio" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title" id="modal-title"><i class="fa fa-trash"></i> Eliminar municipio</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form method="POST" id="frmEliminarMunicipio" name="frmEliminarMunicipio">
        <div class="modal-body">
          <h3 class="text-center">¿Esta seguro de eliminar el municipio <span id="nombreDeMunicipio"></span>?</h3>
          <input type="hidden" name="idMunicipioEliminar" id="idMunicipioEliminar" class="form-control" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit"  id="eliminarMunicipio" class="btn btn-danger">Eliminar </button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="content">
  <div id="listarMunicipios">

  </div>
</div>

@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/municipio_ajax.js"></script>
@endsection