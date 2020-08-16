 <!-- /.card -->
 <div class="content">
    <div class="card">
      <div class="card-header ">
        <h3 class="card-title">Listado categoria de productos</h3>
        <!--modal de boton registar rol-->
        <button id="modal" type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal-crear">
          <i class="fas fa-plus"></i>
          Crear Categoria
        </button>
       <!--fin modal de boton registar rol-->
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="tabla-porcentaje" class="table table-bordered table-striped w-100">
          <thead class="bg-info">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Fecha de Creación</th>
            <th width="120px">Acciones</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($categoriap as $categoriaps)
              <tr>
                <td>{{$categoriaps->id}}</td>
                <td>{{$categoriaps->nombre}}</td>
                <td>{{$categoriaps->detalle}}</td>
                <td>{{$categoriaps->created_at}}</td>
                <td class="text-center">
                  <button class="btn btn-info btn-xs" data-toggle="modal"  data-target="#modal-editar" onclick="Editar('{{$categoriaps->id}}','{{$categoriaps->nombre}}','{{$categoriaps->detalle}}')">
                    <i class="fa fa-pen"></i> Editar
                  </button>
                  <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-eliminar" onclick="Eliminar('{{$categoriaps->id}}','{{$categoriaps->nombre}}')">
                    <i class="fa fa-times"></i> Eliminar
                  </button>
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
  //iniciacion de tablas de pais
  $(function () {
     $("#tabla-porcentaje").DataTable({
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
