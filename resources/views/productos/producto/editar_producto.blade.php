{!! Form::model($producto, ['route' => ['producto_actualizar', $producto->id], 'method' => 'PUT', 'id' =>'frmEditarProducto']) !!}
  <div class="modal-body">
    <div class="row mb-3">
      <div class="col-6 mx-auto">
        @if(!$producto->foto)
          <img id="fotoProducto" src="/img/social.png" class="mb-3 rounded mx-auto d-block " alt="Foto del producto" width="150" height="150">
        @else
          <img id="fotoProducto" src="{{ Storage::url($producto->foto) }}" class="mb-3 rounded mx-auto d-block " alt="Foto del producto" width="150" height="150">
        @endif
        <div class="custom-file">
          <label class="custom-file-label" for="fotoSeleccionada">Foto del producto</label>          
          <input type="file" class="custom-file-input" id="fotoSeleccionada" name="fotoProducto" lang="es" accept="image/png, .jpeg, .jpg, image/gif">
        </div>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-6">
        <label for="idTipoArticulo">Seleccione tipo artículo (*)</label>
        {{ Form::select('id_tipo_articulo', $tipoArticulos, null, array('class'=>'form-control select-producto', 'id' => 'idTipoArticulo')) }}
      </div>
      <div class="col-6">
        <label for="idProveedor">Seleccione el proveedor (*)</label> 
        {{ Form::select('id_proveedor', $proveedores, null, array('class'=>'form-control select-producto', 'id' => 'idProveedor')) }}
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-6">                
        <label for="nombreProducto">Nombre del producto (*)</label>
        {{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombreProducto']) }}
      </div>
      <div class="col-6">
        <label for="valorCompraProducto">Valor de compra del producto (*)</label>
        {{ Form::number('valor_compra', null, ['class' => 'form-control', 'id' => 'valorCompraProducto']) }}
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-6">                
        <label for="valorEnvioProducto">Valor de envio del producto (*)</label>        
        {{ Form::number('valor_envio', null, ['class' => 'form-control', 'id' => 'valorEnvioProducto']) }}
      </div>
      <div class="col-6">
        <label for="porcentajeMinimoProducto">Porcentaje mínimo (*)</label>
        {{ Form::number('porcentaje_minimo', null, ['class' => 'form-control', 'id' => 'porcentajeMinimoProducto']) }}
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-6">                
        <label for="idPorcentaje">Seleccione el porcentaje (*)</label>        
        {{ Form::select('id_porcentaje', $porcentajes, null, array('class'=>'form-control select-producto', 'id' => 'idPorcentaje')) }}
      </div>
      <div class="col-6">
        <label for="codigoBarrasProducto">Código de barras (*)</label>
        {{ Form::text('codigo_barras', null, ['class' => 'form-control', 'id' => 'codigoBarrasProducto']) }}
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-12">
        <label for="descripcionProducto">Descripción (*)</label>
        {{ Form::textarea('especificaciones', null, ['class' => 'form-control', 'id' => 'descripcionProducto', 'cols' => '3', 'rows' => '3']) }}
      </div>
    </div>

    <div class="form-group text-center">
      {{ Form::submit('Actualizar', ['id' => 'actualizarProducto', 'class' => 'btn btn-primary']) }}
    </div>
  </div>
{!! Form::close() !!}
<script type="text/javascript">
  // Para seleccionar foto
  $('.custom-file-input').on('change', function(event) {
    var inputFile = event.currentTarget;
    $(inputFile).parent()
        .find('.custom-file-label')
        .html(inputFile.files[0].name);
  });

  function readFile(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
        reader.onload = function (e) {
          $('#fotoProducto').attr("src", e.target.result);
        }
      reader.readAsDataURL(input.files[0]);
    }
  }
  document.getElementById('fotoSeleccionada').onchange = function (e) {
    readFile(e.srcElement);
  }
  // Selectores de busqueda
  $('.select-producto').select2({
    theme: 'bootstrap4',
  });

  $("#frmEditarProducto").submit(function(ev){
    var ruta = $(this).attr("action");
    $.ajax({
      url: ruta,
      type: 'POST',
      data: new FormData(this),
      contentType: false,
      processData: false,
      cache: false,
      success: function(response){ // En caso de que todo salga bien.
        toastr.success(response.mensaje);
        $(".close").click();
        listarProducto();
      },
      error: function(eerror) {
        var array = Object.values(eerror.responseJSON.errors);
        array.forEach(element => toastr.error(element));
       }
    });
    ev.preventDefault();
  });
</script>