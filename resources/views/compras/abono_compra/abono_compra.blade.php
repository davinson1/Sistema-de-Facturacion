@extends('layouts.app')
@section('titulo')
Abonos compras
@endsection
@section('menu-open-compras')
menu-open
@endsection
@section('active-abono-compra')
active
@endsection
@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-file-invoice-dollar"></i> Abono de compra</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">Abono de compra</a></li>
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
          <h4 class="modal-title"><i class="fas fa-plus"></i> Registrar un abono compra</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        @csrf
        <form id="frmCrearAbonoCompra">
          <div class="modal-body">
            <div class="row mb-3">
              <div class="col-6">
                <label for="idCompra">Seleccione compra (*)</label>
                <select id="idCompra" class="form-control select-abono-compra" name="id_compra" required="">
                  @foreach ($compras as $compra)
                    <option value="{{$compra->id}}">{{$compra->descripcion}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-6">
                <label for="idInteres">Seleccione el interes (*)</label>
                <select id="idInteres" class="form-control select-abono-compra" name="interes" required="">
                  @foreach ($intereses as $interes)
                    <option value="{{$interes->id}}">{{$interes->nombre}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-6">
                <label for="numeroCuota">Número de cuotas</label>
                <input type="number" id="numeroCuota" class="form-control focus" name="numero_cuota">
              </div>
              <div class="col-6">
                <label for="totalCuota">Total de cuotas</label>
                <input type="number" id="totalCuota" class="form-control" name="total_cuota">
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-6">
                <label for="fechaProgramada">Fecha de programación</label>
                <input type="date" id="fechaProgramada" class="form-control" name="fecha_programada">
              </div>
              <div class="col-6">
                <label for="fechaCompromiso">Fecha de compromiso</label>
                <input type="date" id="fechaCompromiso" class="form-control" name="fecha_compromiso">
              </div>
            </div>
            
            <div class="row mb-3">
              <div class="col-6">
                <label for="fechaPago">Fecha de pago</label>
                <input type="date" id="fechaPago" class="form-control" name="fecha_pago">
              </div>
              <div class="col-6">
                <label for="valor">Valor</label>
                <input type="number" id="valor" class="form-control" name="valor">
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-6">
                <label for="valorPago">Valor de pago</label>
                <input type="number" id="valorPago" class="form-control" name="valor_pago">
              </div>
              <div class="col-6">
                <label>Pagado:</label>
                <div class="form-check">
                  {{ Form::radio('pagado', '1', null, ['class'=> 'form-check-input', 'id' => 'radioPagado']) }}
                  <label class="form-check-label" for="radioActivo">Pagado</label>
                </div>
                <div class="form-check">
                  {{ Form::radio('pagado', '0', null, ['class'=> 'form-check-input', 'id' => 'radioNoPagado']) }}
                  <label class="form-check-label" for="radioInactivo">Pendiente</label>
                </div>                
              </div>
            </div>

            <div class="form-group">
            </div>
            <div class="form-group">
              <label for="descripcion">Descripción de no pago:</label>
              <textarea id="descripcion" class="form-control" name="descripcion_no_pago" rows="3" placeholder="Descripción del artículo que compra" required=""></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" id="crearAbonoCompra" class="btn btn-info">Crear abono compra</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endcan

@can('editar.abono.compra')
  {{-- Modal para Editar un abono compra --}}
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

@can('eliminar.abono.compra')
  {{-- Modal para Eliminar un abono compra --}}
  <div class="modal fade" id="modal-eliminar" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h4 class="modal-title"><i class="fa fa-trash"></i> Eliminar abono compra</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        @csrf
        <form>
          <div class="modal-body">
            <h3 class="text-center">¿Esta seguro de eliminar abono compra con descripción <span id="nombreDeAbonoCompra"></span>?</h3>
            <input id="idAbonoCompraEliminar" class="form-control" type="hidden" required="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button id="eliminarAbonoCompra" class="btn btn-danger" type="submit">Eliminar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endcan

<div class="content">
  <div id="listarAbonoCompra">
    
  </div>
</div>

@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/compras/abono_compra_ajax.js"></script>
@endsection