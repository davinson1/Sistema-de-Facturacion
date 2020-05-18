 <!-- /.card -->
<div class="content">
  <div class="card">
    <div class="card-header ">
      <h3 class="card-title">Listado tipos de facturas</h3>
      @can('crear.tipos.facturas')
        <!--modal de boton registar tipos de factura-->
        <button id="modal" type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal-crear">
          <i class="fas fa-plus"></i>
          Crear tipo de factura
        </button>
       <!--fin modal de boton registar tipos de factura-->
      @endcan
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="tablaTipoFactura" class="table table-bordered table-striped w-100">
        <thead class="bg-info">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Consecutivo</th>
          <th>Fecha de Creación</th>
          <th width="120px">Acciones</th>
        </tr>
        </thead>
        <tbody>
          <tr>
          @foreach ($tiposFacturas as $tipoFactura)
            <td>{{$tipoFactura->id}}</td>
            <td>{{$tipoFactura->nombre}}</td>
            <td>{{$tipoFactura->consecutivo}}</td>
            <td>{{$tipoFactura->updated_at}}</td>
            <td class="text-center">
              @can('editar.tipos.facturas')
                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-editar" onclick="Editar('{{$tipoFactura->id}}','{{$tipoFactura->nombre}}')">
                  <i class="fa fa-pen"></i> Editar
                </button>
              @endcan
              @can('eliminar.tipos.facturas')
                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-eliminar" onclick="Eliminar('{{$tipoFactura->id}}','{{$tipoFactura->nombre}}')">
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
//iniciacion de tabla tipo de factura
$(function () {
   $("#tablaTipoFactura").DataTable({
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