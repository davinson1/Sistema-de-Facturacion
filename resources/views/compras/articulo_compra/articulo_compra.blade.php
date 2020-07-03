@extends('layouts.app')
@section('titulo')
Artículos compras
@endsection
@section('menu-open-compras')
menu-open
@endsection
@section('active-articulo-compra')
active
@endsection
@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-shopping-bag"></i> Artículos de compra</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">Artículos de compra</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

@can('crear.articulo.compra')
  {{-- Modal para registro de articulo compra --}}
  <div class="modal fade" id="modal-crear" >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title"><i class="fas fa-plus"></i> Registrar un artículo compra</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        @csrf
        <form id="frmCrearArticuloCompra">
          <div class="modal-body">
            <div class="row mb-3">
              <div class="col-6">
                <label for="idProducto">Seleccione el producto (*)</label>
                <select id="idProducto" class="form-control select-articulo-compra" name="id_articulo" required="">
                  @foreach ($productos as $producto)
                    <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-6">
                <label for="idCompra">Seleccione la compra (*)</label>
                <select id="idCompra" class="form-control select-articulo-compra" name="id_compra" required="">
                  @foreach ($compras as $compra)
                    <option value="{{$compra->id}}">{{$compra->descripcion}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            
            <div class="form-group">
              <label for="cantidad">Cantidad</label>
              <input type="number" id="cantidad" class="form-control focus" name="cantidad">
            </div>

            <div class="form-group">
              <label>Estado de la entrega:</label>
              <div class="form-check">
                {{ Form::radio('entregado', '1', null, ['class'=> 'form-check-input', 'id' => 'radioEntregado']) }}
                <label class="form-check-label" for="radioActivo">Entregado</label>
              </div>
              <div class="form-check">
                {{ Form::radio('entregado', '0', null, ['class'=> 'form-check-input', 'id' => 'radioNoEntregado']) }}
                <label class="form-check-label" for="radioInactivo">No entregado</label>
              </div>
            </div>
            <div class="form-group">
              <label for="descripcion">Descripción:</label>
              <textarea id="descripcion" class="form-control" name="descripcion" rows="3" placeholder="Descripción del artículo que compra" required=""></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" id="crearArticuloCompra" class="btn btn-info">Crear artículo compra</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endcan

@can('editar.articulo.compra')
  {{-- Modal para Editar un articulo compra --}}
  <div class="modal fade" id="modal-editar" >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title"><i class="fa fa-pen"></i> Editar artículo compra</h4>
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

@can('eliminar.articulo.compra')
  {{-- Modal para Eliminar un articulo compra --}}
  <div class="modal fade" id="modal-eliminar" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h4 class="modal-title"><i class="fa fa-trash"></i> Eliminar artículo compra</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        @csrf
        <form>
          <div class="modal-body">
            <h3 class="text-center">¿Esta seguro de eliminar artículo compra <span id="nombreDeArticuloCompra"></span>?</h3>
            <input id="idArticuloCompraEliminar" class="form-control" type="hidden" required="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button id="eliminarArticuloCompra" class="btn btn-danger" type="submit">Eliminar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endcan

<div class="content">
  <div id="listarArticuloCompra">
    
  </div>
</div>

@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/compras/articulo_compra_ajax.js"></script>
@endsection