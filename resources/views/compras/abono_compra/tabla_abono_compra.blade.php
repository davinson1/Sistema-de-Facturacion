<!-- /.card -->
<div class="content">
  <div class="card">
    <div class="card-header ">
      <h3 class="card-title">Listado de abonos compras</h3>
      @can('crear.abono.compra')
        <!--modal de boton registar abono compra-->
        <button id="modal" type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal-crear">
          <i class="fas fa-plus"></i>
          Crear abono compra
        </button>
       <!--fin modal de boton registar abono compra-->
      @endcan
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="tablaAbonoCompra" class="table table-bordered table-striped w-100">
        <thead class="bg-info">
        <tr>
          <th>ID</th>
          <th>Descripción compra</th>          
          <th>Interes</th>
          <th>Número de cuotas</th>
          <th>Total de cuotas</th>
          <th>Fecha programada</th>
          <th>Fecha compromiso</th>
          <th>Fecha pago</th>
          <th>Estado</th>
          <th width="120px">Acciones</th>
        </tr>
        </thead>
        <tbody>
          <tr>
          @foreach ($abonosCompras as $abonoCompra)
            <td>{{$abonoCompra->id}}</td>
            <td>{{$abonoCompra->compra->descripcion}}</td>
            <td>{{$abonoCompra->porcentaje->nombre}}</td>
            <td>{{$abonoCompra->numero_cuota}}</td>
            <td>{{$abonoCompra->total_cuota}}</td>
            <td>{{$abonoCompra->fecha_programada}}</td>
            <td>{{$abonoCompra->fecha_compromiso}}</td>
            <td>{{$abonoCompra->fecha_pago}}</td>
            <td>
              @if($abonoCompra->pagado=="1")
                <span class="badge badge-success">Pagado</span>
              @else
                <span class="badge badge-danger">Pendiente</span>
              @endif
            </td>
            <td class="text-center">
              @can('editar.abono.compra')
                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-editar" onclick="Editar('{{$abonoCompra->id}}')">
                  <i class="fa fa-pen"></i> Editar
                </button>
              @endcan
              @can('eliminar.abono.compra')
                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-eliminar" onclick="Eliminar('{{$abonoCompra->id}}', '{{$abonoCompra->compra->descripcion}}')">
                  <i class="fa fa-times"></i> Eliminar
                </button>
              @endcan
             </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- /.card -->
<script type="text/javascript">
//iniciacion de tabla abono compra
$(function () {
   $("#tablaAbonoCompra").DataTable({
    "responsive": true,
    "autoWidth": true,
     language: {
        search: "Buscar",
        "lengthMenu":"Filtrar _MENU_ número de filas",
         "info": "Página _PAGE_ de _PAGES_",
         "infoFiltered": "(Resultados encontrado de _MAX_ en total)",
         paginate: {
            first:      "Premier",
            previous:   "Anterior",
            next:       "Siguiente",
            last:       "Dernier"
        }
      }
    });

   // Autoenfoque para los campos inputs de los modals
   $('#modal-crear, #modal-editar').on('shown.bs.modal', function (e) {
    $('.focus').focus();
    });
  });
</script>