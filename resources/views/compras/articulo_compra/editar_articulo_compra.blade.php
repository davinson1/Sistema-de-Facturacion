{!! Form::model($articuloCompra, ['route' => ['articulo_compra_actualizar', $articuloCompra->id], 'method' => 'PUT', 'id' =>'frmEditarArticuloCompra']) !!}
  <div class="modal-body">
    <div class="row mb-3">
      <div class="col-6">
        <label for="idProducto">Seleccione el producto (*)</label>
        {{ Form::select('id_articulo', $productos, null, array('class'=>'form-control select-articulo-compra', 'id' => 'idProducto')) }}
      </div>
      <div class="col-6">
        <label for="idCompra">Seleccione la compra (*)</label>
        {{ Form::select('id_compra', $compras, null, array('class'=>'form-control select-articulo-compra', 'id' => 'idCompra')) }}
      </div>
    </div>
    <div class="form-group">
      <label for="cantidad">Cantidad</label>
      {{ Form::number('cantidad', null, ['class' => 'form-control', 'id' => 'cantidad']) }}            
    </div>
    <div class="form-group">
      <label>Estado de la entrega:</label>        
      <div class="form-check">
        {{ Form::radio('entregado', '1', null, ['class'=> 'form-check-input', 'id' => 'radioEntregado']) }}
        <label class="form-check-label" for="radioActivo">Entregado</label>
      </div>
      <div class="form-check">
        {{ Form::radio('entregado', '0', null, ['class'=> 'form-check-input', 'id' => 'radioNoEntregado']) }}
        <label class="form-check-label" for="radioInactivo">No entregado</label>
      </div>
    </div>
    <div class="form-group">
      <label for="descripcion">Descripción:</label>
      {{ Form::textarea('descripcion', null, ['class' => 'form-control', 'id' => 'descripcion', 'cols' => '3', 'rows' => '3', 'placeholder' => 'Descripción del artículo que compra']) }}
    </div>

    <div class="form-group text-center">
      {{ Form::submit('Actualizar', ['id' => 'actualizarArticuloCompra', 'class' => 'btn btn-primary']) }}
    </div>
  </div>
{!! Form::close() !!}
<script type="text/javascript">
  // Selectores de busqueda
  $('.select-articulo-compra').select2({
    theme: 'bootstrap4',
  });

  $("#frmEditarArticuloCompra").submit(function(ev){
    var url = $(this).attr("action");
    const params = $("#frmEditarArticuloCompra").serialize();
    proccessFunction(url, 'PUT', params, callbackStoreArticuloCompraEditar);
    
    ev.preventDefault();
  });

  function callbackStoreArticuloCompraEditar(status, response){
  if (status != 200){
    if (response.responseJSON.exception == "Illuminate\\Database\\QueryException") {
      toastr.error("Por favor, elimine los datos asociados a este artículo compra.");
       $(".close").click();
      }else{
        var array = Object.values(response.responseJSON.errors);
        array.forEach(element => toastr.error(element));
      }
    return false;
  };

  toastr.success(response.mensaje);
  $(".close").click();
  listarArticuloCompra();
}
</script>