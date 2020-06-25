@extends('layouts.app')
@section('titulo')
Compra
@endsection
@section('menu-open-compras')
menu-open
@endsection
@section('active-compra')
active
@endsection
@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-store"></i> Compra</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">Compra</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

@can('crear.compra')
  {{-- Modal para registro de compra --}}
  <div class="modal fade" id="modal-crear" >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title"><i class="fas fa-plus"></i> Registrar una compra</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        @csrf
        <form id="frmCrearCompra" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="row mb-3">
              <div class="col-6">
                <label for="idTipoCompra">Seleccione tipo de compra (*)</label>
                <select id="idTipoCompra" class="form-control select-compra" name="idTipoCompra" required="">
                  @foreach ($tiposCompras as $tipoCompra)
                    <option value="{{$tipoCompra->id}}">{{$tipoCompra->nombre}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-6">
                <label for="idFormaPago">Seleccione la forma de pago (*)</label>
                <select id="idFormaPago" class="form-control select-compra" name="idFormaPago" required="">
                  @foreach ($formasPago as $proveedor)
                    <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="custom-file">
              <label class="custom-file-label" for="scannerCompra">Scanner</label>
              <input type="file" class="custom-file-input" id="scannerCompra" name="scannerCompra" lang="es">
            </div>
            <div class="form-group">
              <label for="descripcionCompra">Descripción compra:</label>
              <textarea id="descripcionCompra" class="form-control" name="descripcionCompra" rows="3" placeholder="Descripción de compra" required=""></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" id="crearCompra" class="btn btn-info">Crear compra</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endcan

@can('editar.compra')
  {{-- Modal para Editar un compra --}}
  <div class="modal fade" id="modal-editar" >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title"><i class="fa fa-pen"></i> Editar compra</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="formulario">
        
          </div>
        </div>
      </div>
    </div>
  </div>
@endcan

@can('eliminar.compra')
  {{-- Modal para Eliminar un compra --}}
  <div class="modal fade" id="modal-eliminar" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h4 class="modal-title"><i class="fa fa-trash"></i> Eliminar compra</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        @csrf
        <form>
          <div class="modal-body">
            <h3 class="text-center">¿Esta seguro de eliminar la compra (ID: <span id="idDeCompra"></span>) con tipo de compra <span id="nombreDeCompra"></span>?</h3>
            <input id="idCompraEliminar" class="form-control" type="hidden" required="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button id="eliminarCompra" class="btn btn-danger" type="submit">Eliminar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endcan

<div class="content">
  <div id="listarCompra">
    
  </div>
</div>

@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/compras/compra_ajax.js"></script>
@endsection