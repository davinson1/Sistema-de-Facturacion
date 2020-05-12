@extends('layouts.app')
@section('titulo')
Departamentos
@endsection
@section('menu-open1')
menu-open
@endsection
@section('active7')
active
@endsection
@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-thumbtack"></i> Departamentos</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">departamentos</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

@can('crear.departamento')
{{-- Modal para registro de un nuevo departamento --}}
<div class="modal fade" id="modal-crear" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fas fa-plus"></i> Registrar un departamento</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">
          <div class="form-group">
            <label for="idPais">Seleccione el pais</label>
            <select id="idPais" class="custom-select mb-3">
              @foreach ($pais as $paises)
                <option value="{{$paises->id}}">{{$paises->nombre}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="nombreDepartamento">Nombre del departamento</label>
            <input id="nombreDepartamento" class="form-control focus" type="text" placeholder="Nombre del departamento" required="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="crearDepartamento" class="btn btn-info">Crear departamento </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan

@can('editar.departamento')
{{-- Modal para Editar un departamento --}}
<div class="modal fade" id="modal-editar" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fa fa-pen"></i> Editar departamento</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">
          <div class="form-group">
            <label for="editarIdPais">Seleccione el país</label>
            <select id="editarIdPais" class="custom-select mb-3">
              <option id="paisSeleccionado" onfocus=""></option>
              <optgroup label="Paises">
                @foreach ($pais as $paises)
                  <option value="{{$paises->id}}">{{$paises->nombre}}</option>
                @endforeach
              </optgroup>
            </select>
          </div>
          <div class="form-group">
            <input id="idDepartamento" class="form-control" type="hidden" required="">
            <input id="editarDepartamento" class="form-control focus" type="text" required="">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" type="button" data-dismiss="modal">Cerrar</button>
          <button id="editarDepartamento1" class="btn btn-info" type="submit">Editar departamento </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan

@can('eliminar.departamento')
{{-- Modal para Eliminar un departamento --}}
<div class="modal fade" id="modal-eliminar" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title"><i class="fa fa-trash"></i> Eliminar departamento</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">
          <h3 class="text-center">¿Esta seguro de eliminar el municipio <span id="nombreDeDepartamento"></span>?</h3>
          <input id="idDepartamento" class="form-control" type="hidden" required="">
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" type="button"  data-dismiss="modal">Cancelar</button>
          <button id="eliminarDepartamento" class="btn btn-danger" type="submit">Eliminar </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan

<div class="content">
  <div id="listarDepartamentos">

  </div>
</div>

@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/departamento_ajax.js"></script>
@endsection