<!-- /.card -->
<div class="content">
  <div class="card">
    <div class="card-header ">
      <h3 class="card-title">Listado artículos</h3>
      @can('crear.articulos')
        <!--modal de boton registar artículos -->
        <button id="modal" type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal-crear">
          <i class="fas fa-plus"></i>
          Crear artículo
        </button>
       <!--fin modal de boton registar artículos-->
      @endcan
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="tablaArticulo" class="table table-bordered table-striped w-100">
        <thead class="bg-info">
        <tr>
          <th>ID</th>
          <th>foto</th>
          <th>Fecha de Creación</th>
          <th width="120px">Acciones</th>
        </tr>
        </thead>
        <tbody>
          <tr>
          @foreach ($articulos as $articulo)
            <td>{{$articulo->id}}</td>
            <td>
              @if(!$articulo->foto)
                <img id="img1"  src="/img/social.png" class="mb-3 rounded mx-auto d-block " alt="Foto del usuario" width="100" height="100"> 
              @else
                <img id="img1"  src="{{ Storage::url($articulo->foto) }}" class="mb-3 rounded mx-auto d-block " alt="Foto del usuario" width="100" height="100">
              @endif
            </td>
            <td>{{$articulo->created_at}}</td>
            <td class="text-center">
              @can('editar.articulos')
                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-editar" onclick="Editar('{{$articulo->id}}')">
                  <i class="fa fa-pen"></i> Editar
                </button>
              @endcan
              @can('eliminar.articulos')
                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-eliminar" onclick="Eliminar('{{$articulo->id}}','{{$articulo->foto}}')">
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
//iniciacion de tabla artículos
$(function () {
   $("#tablaArticulo").DataTable({
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