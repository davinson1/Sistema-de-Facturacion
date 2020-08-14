@foreach ($compraTemportal as $temporal)
  <tr>
    <td> {{$temporal->id_producto}}</td>
    <td> {{$temporal->nombre_producto}}</td>
    <td><img id="img1" src="{{ $temporal->foto }}" class="rounded mx-auto d-block " alt="Foto del producto" width="30" height="30"></td>
    <td> {{$temporal->codigo_barras}}</td>
    <td> {{$temporal->descripcion_producto}}</td>
    <td>
      <div class="col-9">
        <input type="number" class="form-control" value="1">
      </div>
    </td>
    <td>
      <div class="col-12">
        <input type="number" class="form-control" name="precio" id="precio" value="{{old('precio')}}">
      </div>
    </td>
    <td class="text-center">
      <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-eliminar" >
        <i class="fa fa-trash"></i>
      </button>
    </td>
  </tr>
@endforeach



