@extends('layouts.app')
@section('titulo')
Artículos compras
@endsection
@section('menu-open-compras')
menu-open
@endsection
@section('active-consulta-compras')
active
@endsection
@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-shopping-bag"></i> Historia del compras</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">Historia del compras</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


@can('anular.compra')
  {{-- Modal para Eliminar empresa --}}
  <div class="modal fade" id="modal-anularcompra" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h4 class="modal-title"><i class="fa fa-trash"></i>Anular Compra</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        @csrf
        <form>
          <div class="modal-body">
            <h3 class="text-center">¿Esta seguro de anular la compra: <span id="descripcionCompra"></span>?</h3>
            <input id="idAnularCompra" name="estado" class="form-control" type="hidden" required="">
          </div>
          <div class="modal-footer">
            <button class="btn btn-default" type="button" data-dismiss="modal">Cancelar</button>
            <button id="anular_compra" class="btn btn-danger" type="submit">Anular</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endcan





<div class="content">
  <div id="listarCompras">

  </div>
</div>

@endsection
@section('script_ajax')

<script  type="text/javascript" src="/js/compras/consulta_compras_ajax.js"></script>
@endsection
