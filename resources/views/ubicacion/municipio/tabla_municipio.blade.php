 <!-- /.card -->
<div class="content">
  <div class="card">
    <div class="card-header ">
      <h3 class="card-title">Listado de municipios</h3>
      <!--modal de boton registar rol-->
      <button id="modal" type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal-crear">
        <i class="fas fa-plus"></i>
        Crear municipio
      </button>
     <!--fin modal de boton registar rol-->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="tabla-pais" class="table table-bordered table-striped w-100">
        <thead class="bg-info">
        <tr>
          <th>ID</th>
          <th>Departamento</th>
          <th>Municipio</th>
          <th>Fecha de Creación</th>
          <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
          <tr>
          @foreach ($municipio as $municipios)
            <td>{{$municipios->id}}</td>
            <td>{{$municipios->departamentos->nombre}}</td>
            <td>{{$municipios->nombre}}</td>
            <td>{{$municipios->updated_at}}</td>
            <td>
              <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-editar" onclick="Editar('{{$municipios->id}}','{{$municipios->nombre}}','{{$municipios->id_departamento}}', '{{ $municipios->departamentos->nombre }}')">
                <i class="fa fa-pen"></i>
              </button>
              <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-eliminar" onclick="Eliminar('{{$municipios->id}}','{{$municipios->nombre}}')">
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
//iniciacion de tablas de pais
$(function () {
   $("#tabla-pais").DataTable({
    "responsive": true,
    "autoWidth": true,
    });

   // Autoenfoque para los campos inputs de los modals
   $('#modal-crear, #modal-editar').on('shown.bs.modal', function (e) {
    $('.focus').focus();
    });
  });
</script>