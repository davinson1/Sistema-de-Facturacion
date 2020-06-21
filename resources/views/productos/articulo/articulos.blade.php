@extends('layouts.app')
@section('titulo')
Artículos
@endsection
@section('menu-open-producto')
menu-open
@endsection
@section('active-articulo')
active
@endsection
@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-shopping-basket"></i> Artículos</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">Artículos</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

@can('crear.articulos')
  {{-- Modal para registro de articulo --}}
  <div class="modal fade" id="modal-crear" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title"><i class="fas fa-plus"></i> Registrar artículo</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        @csrf
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label for="nombreFormaPago">Nombre formas de pago:</label>
              <input id="nombreFormaPago" class="form-control focus" type="text" placeholder="Nombre formas de pago" required="">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" id="crearFormaPago" class="btn btn-info">Crear artículo </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endcan

@can('eliminar.articulos')
{{-- Modal para Eliminar un tipo tributario --}}
<div class="modal fade" id="modal-eliminar" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title"><i class="fa fa-trash"></i> Eliminar artículo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">
          <h3 class="text-center">¿Esta seguro de eliminar el artículo ?</h3>
          <span id="nombreArticulos"></span>
          <img id="imgArticulo" src="/img/social.png" class="mb-3 rounded mx-auto d-block " alt="Foto del usuario" width="100" height="100"> 
          <input id="idArticulosEliminar" class="form-control" type="hidden" required="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button id="eliminarArticulos" class="btn btn-danger" type="submit">Eliminar </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan

<div class="content">
  <div id="listarArticulos">
    
  </div>
</div>

@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/productos/articulos_ajax.js"></script>
@endsection