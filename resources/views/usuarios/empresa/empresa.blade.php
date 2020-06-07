@extends('layouts.app')
@section('titulo')
Empresa
@endsection
@section('menu-open-usuario')
menu-open
@endsection
@section('active-empresa')
active
@endsection
@section('contenido')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-building"></i> Empresa
        </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="home">Inicio</a></li>
          <li class="breadcrumb-item"><a href="usuarios">Empresa</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

@include("usuarios.empresa.crear_empresa")

@can('editar.empresa')
{{-- Modal para Editar un rol --}}
<div class="modal fade" id="modal-editar" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fa fa-pen"></i> Editar empresa</h4>
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

@can('eliminar.empresa')
  {{-- Modal para Eliminar empresa --}}
  <div class="modal fade" id="modal-eliminar" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h4 class="modal-title"><i class="fa fa-trash"></i> Eliminar empresa</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        @csrf
        <form>
          <div class="modal-body">
            <h3 class="text-center">¿Esta seguro de eliminar la empresa <span id="nombreDeEmpresa"></span>?</h3>
            <input id="idEmpresaEliminar" class="form-control" type="hidden" required="">
          </div>
          <div class="modal-footer">
            <button class="btn btn-default" type="button" data-dismiss="modal">Cancelar</button>
            <button id="eliminarEmpresa" class="btn btn-danger" type="submit">Eliminar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endcan

<div class="content">
  <div id="ListarEmpresas">
    
  </div>
</div>

@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/usuarios/empresa_ajax.js"></script>
@endsection