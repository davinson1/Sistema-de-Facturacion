@extends('layouts.app')
@section('titulo')
Tipos de compras
@endsection
@section('menu-open-compras')
menu-open
@endsection
@section('active-tipo-compra')
active
@endsection
@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-store-alt"></i> Tipos de compras</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">Tipos de compras</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

@can('crear.tipo.compra')
  {{-- Modal para registro de tipo compra --}}
  <div class="modal fade" id="modal-crear" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title"><i class="fas fa-plus"></i> Registrar un tipo compra</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        @csrf
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label for="nombreTipoCompra">Nombre tipo compra:</label>
              <input id="nombreTipoCompra" class="form-control focus" type="text" placeholder="Nombre tipo compra" required="">
            </div>
            <div class="form-group">
              <label for="descripcionTipoCompra">Descripción tipo compra:</label>
              <textarea id="descripcionTipoCompra" class="form-control" rows="3" placeholder="Descripción tipo compra" required=""></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" id="crearTipoCompra" class="btn btn-info">Crear tipo compra </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endcan

@can('editar.tipo.compra')
  {{-- Modal para Editar un tipo compra --}}
  <div class="modal fade" id="modal-editar" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title"><i class="fa fa-pen"></i> Editar tipo compra</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        @csrf
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label for="editarTipoCompra">Nombre tipo compra:</label>
              <input id="idTipoCompra" class="form-control" type="hidden" required="">
              <input id="editarTipoCompra" class="form-control focus" type="text" required="">
            </div>
            <div class="form-group">
              <label for="descripcionTipoCompraEditar">Descripción tipo compra:</label>
              <textarea id="descripcionTipoCompraEditar" class="form-control" rows="3" placeholder="Descripción tipo compra" required=""></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" id="editarElTipoCompra" class="btn btn-info">Editar tipo compra </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endcan

@can('eliminar.tipo.compra')
  {{-- Modal para Eliminar un tipo compra --}}
  <div class="modal fade" id="modal-eliminar" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h4 class="modal-title"><i class="fa fa-trash"></i> Eliminar tipo compra</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        @csrf
        <form>
          <div class="modal-body">
            <h3 class="text-center">¿Esta seguro de eliminar el tipo compra <span id="nombreDeTipoCompra"></span>?</h3>
            <input id="idTipoCompraEliminar" class="form-control" type="hidden" required="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button id="eliminarTipoCompra" class="btn btn-danger" type="submit">Eliminar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endcan

<div class="content">
  <div id="listarTipoCompra">
    
  </div>
</div>

@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/compras/tipo_compra_ajax.js"></script>
@endsection