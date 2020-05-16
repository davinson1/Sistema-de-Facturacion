 <!-- /.card -->
<div class="content">
  <div class="card">
    <div class="card-header ">
      <h3 class="card-title">Listado tipos de documentos</h3>
      @can('crear.tipo.documento')
      <!--modal de boton registar tipo de documento-->
      <button id="modal" type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal-crear">
      <i class="fas fa-plus"></i>
      Crear tipo
      </button>
     <!--fin modal de boton registar tipo de documento-->
     @endcan
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="tablaDocumento" class="table table-bordered table-striped w-100">
        <thead class="bg-info">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Fecha de Creación</th>
          <th width="120px">Acciones</th>
        </tr>
        </thead>
        <tbody id="datos">
          <tr>
          @foreach ($tipoDoc as $tipo_documento)
            <td>{{$tipo_documento->id}}</td>
            <td>{{$tipo_documento->nombre}}</td>
            <td>{{$tipo_documento->updated_at}}</td>
            <td class="text-center">
              @can('editar.tipo.documento')
              <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-editar" onclick="Editar('{{$tipo_documento->id}}','{{$tipo_documento->nombre}}')">
                <i class="fa fa-pen"></i> Editar
              </button>
              @endcan

              @can('eliminar.tipo.documento')
              <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-eliminar" onclick="Eliminar('{{$tipo_documento->id}}','{{$tipo_documento->nombre}}')">
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
//iniciacion de tabls de roles
$(function () {
   $("#tablaDocumento").DataTable({
    "responsive": true,
    "autoWidth": true,
     language: {
        search: "Buscar",
        "lengthMenu":"Filtrar _MENU_ numero de filas",
         "info": "pagina _PAGE_ de _PAGES_",
         "infoFiltered": "(resultados encontrado de _MAX_ en total)",
         paginate: {
            first:      "Premier",
            previous:   "anterior",
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