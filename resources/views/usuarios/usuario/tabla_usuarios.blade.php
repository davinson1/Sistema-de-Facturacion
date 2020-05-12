<!-- /.card -->
<div class="content">
  <div class="card">
    <div class="card-header ">
      <h3 class="card-title">Listado de usuarios</h3>
      @can('crear.usuario')
      <!--modal de boton registar usuario-->
      <button id="modalCrearUsuario" type="button" class="btn btn-info float-right">
        <i class="fas fa-plus"></i>
        Crear usuario
      </button>
     <!--fin modal de boton registar usuario-->
     @endcan
    </div>

<div class="card-body">
      <div id="listarUsuarios">
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
              <td>{{ $usuarios->name }} {{ $usuarios->apellido }}</td>
              <td>{{ $usuarios->numero_documento }}</td>
              <td>{{ $usuarios->email }}</td>
              <td>{{ $usuarios->direccion }}</td>
              <td>{{ $usuarios->updated_at }}</td>
              <td>
                @can('editar.usuario')
                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-editar" onclick="Editar('{{ $usuarios->id }}')">
                  <i class="fa fa-pen"></i>
                </button>
                @endcan
                @can('eliminar.usuario')
                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-eliminar" onclick="Eliminar('{{$usuarios->id}}','{{$usuarios->name}}')">
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
</div>




<script type="text/javascript">
  // Llamar el formulario de crear usuarios
  $('#modalCrearUsuario').click(function(){
      $("#ListarUsuarios").load("formulario_usuarios");
  });


//inicializar tabla usuarios
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