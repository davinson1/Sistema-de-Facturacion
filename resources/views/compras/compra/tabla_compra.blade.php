@foreach ($compraTemportal as $temporal)
  <tr>
    <td>{{$temporal->id_producto}}</td>
    <td>{{$temporal->nombre_producto}}</td>
    <td><img id="img1" src="{{$temporal->foto}}" class="rounded mx-auto d-block " alt="Foto del producto" width="30" height="30"></td>
    <td>{{$temporal->codigo_barras}}</td>
    <td>{{$temporal->descripcion_producto}}</td>
    <td>{{$temporal->cantidad_producto}} ({{$temporal->precio_compra}})</td>
    <td>{{$temporal->cantidad_producto * $temporal->precio_compra}}</td>
    <td class="text-center">
      <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-descartar-producto" onclick="descartarProducto('{{$temporal->id}}', '{{$temporal->nombre_producto}}')">
        <i class="fa fa-trash"></i>
      </button>
    </td>
  </tr>
@endforeach



