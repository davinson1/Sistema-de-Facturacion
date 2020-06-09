

      @csrf
      <form id="frm_ActualizarProveedor">
        <div class="modal-body">

          <div class="row mb-3">
            <div class="col-12">
          <label for="nombreProveedor">Empresa</label>
          <input type="hidden" id="idProveedor" name="id" value="{{$idProveedor->id}}">
          <select id="idEmpresa" class="form-control selectempresaedit" name="id_empresa" required="">
              <option value="{{$idProveedor->id_empresa}}">{{$idProveedor->empresa->nombre}}</option>
              <optgroup label="selecione una empresa">
            @foreach ($empresas as $empresa)
              <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
            @endforeach
            </optgroup>
          </select>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12">
           <label for="nombreProveedor">Nombre (*):</label>
            <input id="nombreProveedor" name="nombre" class="form-control focus" type="text" placeholder="Nombre del proveedor" required="" value="{{$idProveedor->nombre}}">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12">
              <label for="telefonoProveedor">Teléfono:</label>
              <input id="telefonoProveedor" name="telefono" class="form-control focus" type="number" placeholder="Teléfono del proveedor" value="{{$idProveedor->telefono}}">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-12">
              <label for="descripcionProveedor">Descripción del proveedor:</label>
             <textarea id="descripcionProveedor" name="descripcion" class="form-control focus" rows="3" placeholder="Agregue una especificacion" >{{$idProveedor->descripcion}}</textarea>
            </div>
          </div>

          <button type="button" class="btn btn-tool">
                @if ($idProveedor->estado=='1')
                   <input id="switch" name="estado" checked class="switch" type="checkbox">
                   @else
                   <input id="switch" name="estado" class="switch" type="checkbox">
                  @endif

                <label for="switch" class="lbl align-middle"></label>
          </button>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="actualizarProveedor" class="btn btn-info">Actualizar proveedor </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('.selectempresaedit').select2({
        theme: 'bootstrap4',
    });
});
$('#actualizarProveedor').click(function(e) {
  e.preventDefault();
  var idProveedor = $('#idProveedor').val();
  var datos = $('#frm_ActualizarProveedor').serialize();
  const url = 'proveedor_actulizar/'+idProveedor;
  const params = datos;
  proccessFunction(url, 'PUT', params, callbackStoreProveedor);
});

function callbackStoreProveedor(status, response){
  if (status != 200){
       var array = Object.values(response.responseJSON.errors);
        array.forEach(element => toastr.error(element));
    return false;
  };

  toastr.success(response.mensaje);
  $("#nombreporcentaje").val('');
  $("#descripcionporcentaje").val('');
  $("#porcentaje").val('');
  $(".close").click();
  listarProvedores();
}

</script>