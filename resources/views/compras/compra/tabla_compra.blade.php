<!-- /.card -->
<div class="content">
  <div class="card">
    <div class="card-header ">
      <h3 class="card-title">Listado de compras</h3>
      @can('crear.compra')
        <!--modal de boton registar compra-->
        <button id="modal" type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal-crear">
          <i class="fas fa-plus"></i>
          Crear compra
        </button>
       <!--fin modal de boton registar compra-->
      @endcan
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="tablaCompra" class="table table-bordered table-striped w-100">
        <thead class="bg-info">
        <tr>
          <th>ID</th>
          <th>Tipo de compra</th>          
          <th>Scanner</th>
          <th>Descripción</th>
          <th>Fecha de Creación</th>
          <th width="120px">Acciones</th>
        </tr>
        </thead>
        <tbody>
          <tr>
          @foreach ($compras as $compra)
            <td>{{$compra->id}}</td>
            <td>{{$compra->tipoCompra->nombre}}</td>
            <td>
              @if(!$compra->scanner)
                No hay soporte.
              @else
                <a href="{{Storage::url($compra->scanner)}}" target="_black">Soporte</a>
              @endif
            </td>
            <td>{{$compra->descripcion}}</td>
            <td>{{$compra->created_at}}</td>
            <td class="text-center">
              @can('editar.compra')
                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-editar" onclick="Editar('{{$compra->id}}')">
                  <i class="fa fa-pen"></i> Editar
                </button>
              @endcan
              @can('eliminar.compra')
                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-eliminar" onclick="Eliminar('{{$compra->id}}', '{{$compra->tipoCompra->nombre}}')">
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
//iniciacion de tabla compra
$(function () {
   $("#tablaCompra").DataTable({
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