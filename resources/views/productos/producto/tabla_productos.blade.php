<!-- /.card -->
<div class="content">
  <div class="card">
    <div class="card-header ">
      <h3 class="card-title">Listado de productos</h3>
      @can('crear.productos')
        <!--modal de boton registar producto -->
        <button id="modal" type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal-crear">
          <i class="fas fa-plus"></i>
          Crear producto
        </button>
       <!--fin modal de boton registar producto-->
      @endcan
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="tablaProducto" class="table table-bordered table-striped w-100">
        <thead class="bg-info">
        <tr>
          <th>ID</th>
          <th>Tipo de articulo</th>
          <th>Proveedor</th>
          <th>Categoria</th>
          <th>Porcentaje</th>
          <th>Nombre</th>
          <th>Foto</th>
          <th>Valor venta</th>
          <th>cantidad</th>
          <th>Porcentaje Minimo de Venta</th>
          <th>Descripción</th>
          <th>Fecha de Creación</th>
          <th width="120px">Acciones</th>
        </tr>
        </thead>
        <tbody>
          <tr>
          @foreach ($productos as $producto)
            <td>{{$producto->id}}</td>
            <td>{{$producto->tipoArticulos->nombre}}</td>
            <td>{{$producto->proveedor->nombre}}</td>
            <td>{{$producto->categoria->nombre}}</td>
            <td>{{$producto->porcentaje->nombre}}</td>
            <td>{{$producto->nombre}}</td>
            <td>
              @if(!$producto->foto)
                <img id="img1"  src="/img/social.png" class="mb-3 rounded mx-auto d-block " alt="Foto del producto" width="100" height="100">
              @else
                <img id="img1"  src="{{ Storage::url($producto->foto) }}" class="mb-3 rounded mx-auto d-block " alt="Foto del producto" width="100" height="100">
              @endif
            </td>
            <td>{{$producto->valor_venta}}</td>
            <td>{{$producto->cantidad}}</td>
            <td>{{$producto->porcentaje_minimo}}</td>
            <td>{{$producto->especificaciones}}</td>
            <td>{{$producto->created_at}}</td>
            <td class="text-center">
              @can('editar.productos')
                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-editar" onclick="Editar('{{$producto->id}}')">
                  <i class="fa fa-pen"></i> Editar
                </button>
              @endcan
              @can('eliminar.productos')
                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-eliminar" onclick="Eliminar('{{$producto->id}}','{{$producto->nombre}}','{{$producto->foto}}')">
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
//iniciacion de tabla productos
$(function () {
   $("#tablaProducto").DataTable({
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
