 <!-- /.card -->
<div class="content">
  <div class="card">
    <div class="card-header ">
      <h3 class="card-title">Listado de paises</h3>
      @can('crear.pais')
      <!--modal de boton registar rol-->
      <button id="modal" type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal-crear">
        <i class="fas fa-plus"></i>
        Crear país
      </button>
     <!--fin modal de boton registar rol-->
     @endcan
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="tablaPais" class="table table-bordered table-striped">
        <thead class="bg-info">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Fecha de Creación</th>
          <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
          <tr>
          @foreach ($pais as $paises)
            <td>{{$paises->id}}</td>
            <td>{{$paises->nombre}}</td>
            <td>{{$paises->updated_at}}</td>
            <td>
              @can('editar.pais')
              <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-editar" onclick="Editar('{{$paises->id}}','{{$paises->nombre}}')">
                <i class="fa fa-pen"></i>
              </button>
              @endcan
              @can('eliminar.pais')
              <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-eliminar" onclick="Eliminar('{{$paises->id}}','{{$paises->nombre}}')">
                <i class="fa fa-times"></i>
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
//iniciacion de tablas de pais
$(function () {
   $("#tablaPais").DataTable({
    "responsive": true,
    "autoWidth": true,
    });

   // Autoenfoque para los campos inputs de los modals
   $('#modal-crear, #modal-editar').on('shown.bs.modal', function (e) {
    $('.focus').focus();
    });
  });
</script>