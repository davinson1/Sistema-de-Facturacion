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
        <h1 class="m-0 text-dark"><i class="fas fa-thumbtack"></i> Municipios</h1>
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

@can('crear.municipio')
{{-- Modal para registro de un nuevo municipio --}}
<div class="modal fade" id="modal-crear" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fas fa-plus"></i> Registrar un municipio</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">
          <div class="form-group">
            <label for="idDepartamento">Seleccione el departamento</label>
            <select id="idDepartamento" class="custom-select mb-3">
              @foreach ($departamento as $departamentos)
              <option value="{{$departamentos->id}}">{{$departamentos->nombre}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="nombreMunicipio">Nombre del municipio</label>
            <input id="nombreMunicipio" class="form-control focus" type="text" placeholder="Nombre del municipio" required="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="crearMunicipio" class="btn btn-info">Crear País </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan

@can('editar.municipio')
{{-- Modal para Editar un municipio --}}
<div class="modal fade" id="modal-editar" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fa fa-pen"></i> Editar municipio</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">
          <div class="form-group">
            <label for="editarIdDepartamento">Seleccione el departamento</label>
            <select id="editarIdDepartamento" class="custom-select mb-3">
              <option id="departamentoSeleccionado" onfocus=""></option>
              <optgroup label="Departamentos">
                @foreach ($departamento as $departamentos)
                  <option value="{{$departamentos->id}}">{{$departamentos->nombre}}</option>
                @endforeach
              </optgroup>
            </select>
          </div>
          <div class="form-group">
            <label for="nombreMunicipio">Nombre del municipio</label>
            <input id="idMunicipio" class="form-control" type="hidden" required="">
            <input id="editarMunicipio" class="form-control focus" type="text" placeholder="Nombre del municipio" required="">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" type="button" data-dismiss="modal">Cerrar</button>
          <button id="editMunicipio" class="btn btn-info" type="submit">Editar municipio </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan

@can('eliminar.municipios')
{{-- Modal para Eliminar un municipio --}}
<div class="modal fade" id="modal-eliminar" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title"><i class="fa fa-trash"></i> Eliminar municipio</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">
          <h3 class="text-center">¿Esta seguro de eliminar el municipio <span id="nombreDeMunicipio"></span>?</h3>
          <input id="idMunicipioEliminar" class="form-control" type="hidden" required="">
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" type="button"  data-dismiss="modal">Cancelar</button>
          <button id="eliminarMunicipio" class="btn btn-danger" type="submit">Eliminar </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan

<div class="content">
  <div id="listarMunicipios">

  </div>
</div>

@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/municipio_ajax.js"></script>
@endsection