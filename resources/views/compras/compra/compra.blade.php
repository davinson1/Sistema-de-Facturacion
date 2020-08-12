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
              <p class="text-center">
                <strong>Productos</strong>
              </p>



              <div class="input-group mb-3">
                <input type="search" class="form-control" placeholder="Buscar productos">
                <div class="input-group-append">
                  <span class="input-group-text"> <i class="fas fa-search"></i></span>
                </div>
              </div>


              <div class="card-body table-responsive p-0" style="height: 500px;">
              <table class="table table-bordered">
                <thead class="bg-info">
                  <tr>
                    <th style="width: 10px">Codigo</th>
                    <th style="width: 300px">descripción</th>
                    <th style="width: 100px">Cantidad</th>
                    <th>Precio total</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>10</td>
                    <td>arroz</td>
                    <td><input type="number"></td>
                    <td>100</td>
                    <td><button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-eliminar" onclick="Eliminar">
                        <i class="fa fa-trash"></i> Eliminar
                      </button>
                    </td>
                    <!-- Condenido de Ajax -->
                  </tr>
                </tbody>
                <tfoot id="detalle_totales" class="text-right">
                    <!-- Condenido de Ajax -->
                    <tr>
                        <td colspan="4" class="textright">SUBTOTAL Q.</td>
                        <td class="textright">50000</td>
                      </tr>
                      <tr>
                        <td colspan="4" class="textright">IVA 19</td>
                        <td class="textright">0.0</td>
                      </tr>
                      <tr>
                        <td colspan="4" class="textright">TOTAL Q.</td>
                        <td class="textright">1000</td>
                      </tr>

                  </tfoot>
              </table>
            </div>


            </div>
            <!-- /.col -->
            <div class="col-md-4">
              <p class="text-center">
                <strong>Datos compra</strong>
              </p>

              @can('crear.compra')
        <form id="frmCrearCompra" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">

                <label for="idTipoCompra">Proveedor</label>
                <select id="idTipoCompra" class="form-control select-compra" name="idTipoCompra" required="">
                  @foreach ($tiposCompras as $tipoCompra)
                    <option value="{{$tipoCompra->id}}">{{$tipoCompra->nombre}}</option>
                  @endforeach
                </select>

            <div class="row mb-3">
              <div class="col-6">
                <label for="idTipoCompra">Tipo de compra (*)</label>
                <select id="idTipoCompra" class="form-control select-compra" name="idTipoCompra" required="">
                  @foreach ($tiposCompras as $tipoCompra)
                    <option value="{{$tipoCompra->id}}">{{$tipoCompra->nombre}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-6">
                <label for="idFormaPago">Forma de pago (*)</label>
                <select id="idFormaPago" class="form-control select-compra" name="idFormaPago" required="">
                  @foreach ($formasPago as $proveedor)
                    <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
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
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" id="crearCompra" class="btn btn-info">Crear compra</button>
          </div>
        </form>
        @endcan

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
</div>









@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/compras/compra_ajax.js"></script>
@endsection
