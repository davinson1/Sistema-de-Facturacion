<!-- /.card -->
<div class="content">
  <div class="card">
    <div class="card-header ">
      <h3 class="card-title">Listado de artículos compra</h3>
      @can('crear.articulo.compra')
        <!--modal de boton registar artículo compra-->
        <button id="modal" type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal-crear">
          <i class="fas fa-plus"></i>
          Crear artículo compra
        </button>
       <!--fin modal de boton registar artículo compra-->
      @endcan
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="tablaArticuloCompra" class="table table-bordered table-striped w-100">
        <thead class="bg-info">
        <tr>
          <th>ID</th>
          <th>Producto</th>
          <th>Compra</th>
          <th>Entregado</th>
          <th>Cantidad</th>
          <th>Descripción</th>
          <th>Fecha de Creación</th>
          <th width="120px">Acciones</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($articulosCompras as $articuloCompra)
            <tr>
              <td>{{$articuloCompra->id}}</td>
              <td>{{$articuloCompra->producto->nombre}}</td>
              <td>{{$articuloCompra->compra->descripcion}}</td>
              <td>
                @if($articuloCompra->entregado=="1")
                  <span class="badge badge-success">Entregado</span>
                @else
                  <span class="badge badge-danger">Por entregar</span>
                @endif
              </td>
              <td>{{$articuloCompra->cantidad}}</td>
              <td>{{$articuloCompra->descripcion}}</td>
              <td>{{$articuloCompra->created_at}}</td>
              <td class="text-center">
                @can('editar.articulo.compra')
                  <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-editar" onclick="Editar('{{$articuloCompra->id}}')">
                    <i class="fa fa-pen"></i> Editar
                  </button>
                @endcan
                @can('eliminar.articulo.compra')
                  <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-eliminar" onclick="Eliminar('{{$articuloCompra->id}}', '{{$articuloCompra->producto->nombre}}')">
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
//iniciacion de tabla artículo compra
$(function () {
  $("#tablaArticuloCompra").DataTable({
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