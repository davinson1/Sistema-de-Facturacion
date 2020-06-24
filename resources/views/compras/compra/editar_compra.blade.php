{!! Form::model($compra, ['route' => ['compra_actualizar', $compra->id], 'method' => 'PUT', 'id' =>'frmEditarCompra']) !!}
  <div class="modal-body">
    <div class="row mb-3">
      <div class="col-6">
        <label for="idTipoCompra">Seleccione tipo compra (*)</label>
        {{ Form::select('id_tipo_compra', $tiposCompras, null, array('class'=>'form-control select-compra', 'id' => 'idTipoCompra')) }}
      </div>
      <div class="col-6">
        <label for="idFormaPago">Seleccione la forma de pago (*)</label> 
        {{ Form::select('id_forma_pago', $formasPago, null, array('class'=>'form-control select-compra', 'id' => 'idFormaPago')) }}
      </div>
    </div>
    <div class="custom-file">
      <label class="custom-file-label" for="editarScanner">Scanner</label>
      <input type="file" class="custom-file-input" id="editarScanner" name="editarScanner" lang="es">
    </div>
     @if(!$compra->scanner)
        <div class="alert alert-danger text-center p-0 mt-1" role="alert">
          No se ha anexado soporte.
        </div>
      @else
      <div class="alert alert-success text-center p-0 mt-1" role="alert">
        <a href="{{Storage::url($compra->scanner)}}" target="_black">Ver soporte.</a>
      </div>
      @endif   

    <div class="form-group">
      <label for="descripcionCompra">Descripción compra:</label>
      {{ Form::textarea('descripcion', null, ['class' => 'form-control', 'id' => 'descripcionCompra', 'cols' => '3', 'rows' => '3']) }}
    </div>

    <div class="form-group text-center">
      {{ Form::submit('Actualizar', ['id' => 'actualizarCompra', 'class' => 'btn btn-primary']) }}
    </div>
  </div>
{!! Form::close() !!}
<script type="text/javascript">
  // Selectores de busqueda
  $('.select-compra').select2({
    theme: 'bootstrap4',
  });
  // Poner nombre del archivoi en el campo input
  $('.custom-file-input').on('change', function(event) {
    var inputFile = event.currentTarget;
    $(inputFile).parent()
        .find('.custom-file-label')
        .html(inputFile.files[0].name);
  });

  $("#frmEditarCompra").submit(function(ev){
    var url = $(this).attr("action");
    const params = new FormData(this);
    proccessFunction(url, 'POST', params, callbackStoreCompraEditar, false, false, false);
    
    ev.preventDefault();
  });

  function callbackStoreCompraEditar(status, response){
  if (status != 200){
    if (response.responseJSON.exception == "Illuminate\\Database\\QueryException") {
      toastr.error("Por favor, elimine los datos asociados a este tipo de compra.");
       $(".close").click();
      }else{
        var array = Object.values(response.responseJSON.errors);
        array.forEach(element => toastr.error(element));
      }
    return false;
  };

  toastr.success(response.mensaje);
  $(".close").click();
  listarCompra();
}
</script>