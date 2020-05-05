 <!-- /.card -->
<div class="content">
  <div class="card">
    <div class="card-header ">
      <h3 class="card-title">Listado de departamentos</h3>
      <!--modal de boton registar rol-->
      <button id="modal" type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal-crear">
        <i class="fas fa-plus"></i>
        Crear departamento
      </button>
     <!--fin modal de boton registar rol-->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="tabla-departamento" class="table table-bordered table-striped">
        <thead class="bg-info">
        <tr>
          <th>ID</th>
          <th>Pais</th>
          <th>Departamento</th>
          <th>Fecha de Creación</th>
          <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
          <tr>
          @foreach ($departamento as $departamentos)
            <td>{{$departamentos->id}}</td>
            <td>{{$departamentos->pais->nombre}}</td>
            <td>{{$departamentos->nombre}}</td>
            <td>{{$departamentos->updated_at}}</td>
            <td>
              <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-editar" onclick="Editar('{{$departamentos->id}}','{{$departamentos->nombre}}','{{$departamentos->pais->nombre}}')">
                <i class="fa fa-pen"></i>
              </button>
              <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-eliminar" onclick="Eliminar('{{$departamentos->id}}','{{$departamentos->nombre}}')">
                <i class="fa fa-times"></i>
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
//iniciacion de tablas de departamento
$(function () {
   $("#tabla-departamento").DataTable({
    "responsive": true,
    "autoWidth": true,
    });

   // Autoenfoque para los campos inputs de los modals
   $('#modal-crear, #modal-editar').on('shown.bs.modal', function (e) {
    $('.focus').focus();
    });
  });
</script>