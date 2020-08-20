<table class="table table-sm">
  <thead class="bg-success">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Foto</th>
      <th scope="col">Codigo</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Total</th>
      <th scope="col">Venta</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($compraTemporal as $temporal)
      <tr>
        <td>{{$temporal->id_producto}}</td>
        <td>{{$temporal->nombre_producto}}</td>
        <td><img id="img1" src="{{$temporal->foto}}" class="rounded mx-auto d-block " alt="Foto del producto" width="30" height="30"></td>
        <td>{{$temporal->codigo_barras}}</td>
        <td>{{$temporal->descripcion_producto}}</td>
        <td>{{$temporal->cantidad_producto}} ({{$temporal->precio_compra}})</td>
        <td id="precioTabla">{{$temporal->cantidad_producto * $temporal->precio_compra}}</td>
        <td>{{$temporal->precio_venta}}</td>
        <td class="text-center">
          <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-descartar-producto" onclick="descartarProducto('{{$temporal->id}}', '{{$temporal->nombre_producto}}')">
            <i class="fa fa-trash"></i>
          </button>
        </td>
      </tr>
    @endforeach
  </tbody>
  <tfoot class="text-right font-weight-bold">
    <!-- Condenido de Ajax -->        
    <tr>
      <td colspan="7" class="text-right">Total $</td>
      <td id="total" class="text-right">0.00</td>
    </tr>
  </tfoot>
</table>
<script>
  var datos = document.querySelectorAll('td#precioTabla')
  var suma=0;
  datos.forEach((el)=>{
      var total = el.innerHTML
      var total2 =  parseInt(total)
      suma+=total2
  })
  document.getElementById('total').innerHTML = suma;
  document.getElementById('total2').innerHTML = suma;
  document.getElementById('total3').value = suma;
</script>