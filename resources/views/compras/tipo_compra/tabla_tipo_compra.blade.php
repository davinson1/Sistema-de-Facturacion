<!-- /.card -->
<div class="content">
  <div class="card">
    <div class="card-header ">
      <h3 class="card-title">Listado tipos de compras</h3>
      @can('crear.tipo.compra')
        <!--modal de boton registar tipos de compra-->
        <button id="modal" type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal-crear">
          <i class="fas fa-plus"></i>
          Crear tipo compra
        </button>
       <!--fin modal de boton registar tipos de compra-->
      @endcan
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="tablaTipoCompra" class="table table-bordered table-striped w-100">
        <thead class="bg-info">
        <tr>
          <th>ID</th>
          <th>Nombre</th>          
          <th>Descripción</th>          
          <th>Fecha de Creación</th>
          <th width="120px">Acciones</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($tiposCompras as $tipoCompra)
            <tr>
              <td>{{$tipoCompra->id}}</td>
              <td>{{$tipoCompra->nombre}}</td>
              <td>{{$tipoCompra->descripcion}}</td>
              <td>{{$tipoCompra->created_at}}</td>
              <td class="text-center">
                @can('editar.tipo.compra')
                  <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-editar" onclick="Editar('{{$tipoCompra->id}}','{{$tipoCompra->nombre}}','{{$tipoCompra->descripcion}}')">
                    <i class="fa fa-pen"></i> Editar
                  </button>
                @endcan
                @can('eliminar.tipo.compra')
                  <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-eliminar" onclick="Eliminar('{{$tipoCompra->id}}','{{$tipoCompra->nombre}}')">
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
//iniciacion de tabla tipo de compra
$(function () {
   $("#tablaTipoCompra").DataTable({
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