<!-- /.card -->
<div class="content">
  <div class="card">
    <div class="card-header ">
      <h3 class="card-title">Listado de Iva</h3>
      @can('crear.iva')
        <!--modal de boton registar tipos de factura-->
        <button id="modal" type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal-crear">
          <i class="fas fa-plus"></i>
          Crear iva
        </button>
       <!--fin modal de boton registar tipos de factura-->
      @endcan
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="tablaIva" class="table table-bordered table-striped w-100">
        <thead class="bg-info">
        <tr>
          <th>ID</th>
          <th>Valor del iva</th>
          <th>Fecha de creación</th>
          <th>Fecha final</th>
          <th width="120px">Acciones</th>
        </tr>
        </thead>
        <tbody>
          <tr>
          @foreach ($ivas as $iva)
            <td>{{$iva->id}}</td>
            <td>{{$iva->valor_iva}} %</td>
            <td>{{$iva->created_at}}</td>
            <td>{{$iva->fecha_fin}}</td>
            <td class="text-center">
              @can('editar.iva')
                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-editar" onclick="Editar('{{ $iva->id }}','{{ $iva->valor_iva }}','{{ $iva->fecha_fin }}')">
                  <i class="fa fa-pen"></i> Editar
                </button>
              @endcan
              @can('eliminar.iva')
                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-eliminar" onclick="Eliminar('{{ $iva->id }}','{{ $iva->valor_iva }}')">
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
   $("#tablaIva").DataTable({
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