 <!-- /.card -->
<div class="content">
  <div class="card">
    <div class="card-header ">
      <h3 class="card-title">Listado de usuarios</h3>
      <!--modal de boton registar rol-->
      <button id="modal" type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal-crear">
        <i class="fas fa-plus"></i>
        Crear municipio
      </button>
     <!--fin modal de boton registar rol-->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="tabla-usuario" class="table table-bordered table-striped">
        <thead class="bg-info">
        <tr>
          <th>ID</th>
          <th>Usuario</th>
          <th>Documento</th>
          <th>Correo</th>
          <th>Dirección</th>
          <th>Fecha de Creación</th>
          <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
          <tr>
          @foreach ($usuario as $usuarios)
            <td>{{ $usuarios->id }}</td>
            <td>{{ $usuarios->name }} {{ $usuarios->Apellido }}</td>
            <td>{{ $usuarios->Numero }}</td>
            <td>{{ $usuarios->email }}</td>
            <td>{{ $usuarios->Direccion }}</td>
            <td>{{ $usuarios->updated_at }}</td>
            <td>
              <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-editar" onclick="Editar('{{$usuarios->id}}','{{$usuarios->name}}')">
                <i class="fa fa-pen"></i>
              </button>
              <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-eliminar" onclick="Eliminar('{{$usuarios->id}}','{{$usuarios->name}}')">
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
//iniciacion de tablas de usuario
$(function () {
   $("#tabla-usuario").DataTable({
    "responsive": true,
    "autoWidth": true,
    });

   // Autoenfoque para los campos inputs de los modals
   $('#modal-crear, #modal-editar').on('shown.bs.modal', function (e) {
    $('.focus').focus();
    });
  });
</script>