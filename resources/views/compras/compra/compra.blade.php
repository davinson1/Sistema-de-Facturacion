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
@section('css')
<!-- CSS file -->
<link rel="stylesheet" href="/plugins/EasyAutocomplete/easy-autocomplete.css">
<!-- Additional CSS Themes file - not required -- tema para los input no es importante-->
{{-- <link rel="stylesheet" href="/plugins/EasyAutocomplete/easy-autocomplete.themes.css"> --}}
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

@can('eliminar.compra')
  {{-- Modal para Eliminar un producto seleccionado --}}
  <div class="modal fade" id="modal-descartar-producto" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h4 class="modal-title"><i class="fa fa-trash"></i> Descartar producto</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        @csrf
        <form>
          <div class="modal-body">
            <h3 class="text-center">¿Esta seguro de descartar el productos <span id="nombreProducto"></span>?</h3>
            <input id="idCompraTemporal" class="form-control" type="hidden" required="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button id="descartarProductoTemporal" class="btn btn-danger" type="submit">Descartar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endcan

<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Registrar compra</h5>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">
              <form id="frmBuscarProducto">
                <div class="row">
                  <div class="col-6">
                    <label for="buscadorProducto">Seleccione el producto</label>
                    <input id="buscadorProducto" type="text" class="form-control" placeholder="Buscar Producto" required="">
                  </div>
                  <div class="col d-none">
                    <label for="cantidad_compra">Cantidad a comprar</label>
                    <input id="cantidad_compra" class="form-control" type="number" value="1" required="">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col d-none">
                    <label for="precio_compra">Precio de compra</label>
                    <input id="precio_compra" class="form-control" type="number" placeholder="2000" required="">
                  </div>
                  <div class="col d-none">
                    <label for="precio_venta">Precio de venta</label>
                    <input id="precio_venta" class="form-control" type="number" placeholder="2000" required="" data-toggle="tooltip" data-placement="top" title="Precio con el que se va a vender el producto">
                  </div>                  
                </div>
                <div class="row">                  
                  <div class="col text-center d-none">
                    <button id="agregarProducto" class="btn btn-success btn-sm" type="submit"><i class="fas fa-plus"></i> Agregar</button>
                  </div>                  
                </div>                              
              </form>
              <div id="listarCompra" class="table-responsive shadow rounded p-0 mt-3">
                
              </div>
            </div>
            <!-- /.col -->
            <div class="col-md-4 shadow rounded">
              <div class="info-box bg-success m-0">
                <span class="info-box-icon"><i class="fas fa-dollar-sign"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total a pagar</span>
                  <span id="total2" class="info-box-number h2">0.00</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              @can('crear.compra')
              <!-- form start -->
              <form id="frmCrearCompra" class="mb-3" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                    <label for="idProveedor">Proveedor</label>
                    <select id="idProveedor" class="form-control select-compra" name="idProveedor" required="">
                      @foreach ($proveedores as $proveedor)
                        <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <label for="idTipoCompra">Tipo de compra</label>
                      <select id="idTipoCompra" class="form-control select-compra" name="idTipoCompra" required="">
                        @foreach ($tiposCompras as $tipoCompra)
                          <option value="{{$tipoCompra->id}}">{{$tipoCompra->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-6">
                      <label for="idFormaPago">Forma de pago</label>
                      <select id="idFormaPago" class="form-control select-compra" name="idFormaPago" required="">
                        @foreach ($formasPago as $formaPago)
                          <option value="{{$formaPago->id}}">{{$formaPago->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="custom-file">
                    <label class="custom-file-label" for="scannerCompra">Soporte de compra</label>
                    <input type="file" class="custom-file-input" id="scannerCompra" name="scannerCompra" lang="es">
                  </div>

                  <div class="form-group">
                    <label for="descripcionCompra">Descripción</label>
                    <textarea id="descripcionCompra" class="form-control" name="descripcionCompra" rows="3" placeholder="Descripción de compra" required=""></textarea>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-ban"></i> Anular</button>
                  <button type="submit" id="crearCompra" class="btn btn-success"><i class="fas fa-save"></i> Comprar</button>
                </div>
              </form>              
              @endcan
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- ./card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.content -->

@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/compras/compra_ajax.js"></script>
<!-- Para usar EasyAutoComplete -->
<script src="plugins/EasyAutocomplete/jquery.easy-autocomplete.js"></script>
@endsection
