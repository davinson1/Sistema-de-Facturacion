@can('crear.proveedores')
{{-- Modal para registro de proveedor --}}
<div class="modal fade" id="modal-crear" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fas fa-plus"></i> Registrar un proveedor</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form >
        <div class="modal-body">

          <div class="row mb-3">
            <div class="col-12">
          <label for="nombreProveedor">Empresa</label>

          <select id="idEmpresa" class="form-control selectempresa" name="tipoDocumento" required="">
            @foreach ($empresas as $empresa)
              <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
            @endforeach
          </select>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12">
           <label for="nombreProveedor">Nombre (*):</label>
            <input id="nombreProveedor" class="form-control focus" type="text" placeholder="Nombre del proveedor" required="">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-12">
              <label for="telefonoProveedor">Teléfono:</label>
              <input id="telefonoProveedor" class="form-control" type="number" placeholder="Teléfono del proveedor">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-12">
              <label for="descripcionProveedor">Descripción del proveedor:</label>
              <textarea id="descripcionProveedor" class="form-control" rows="3" placeholder="Agregue una especificación"></textarea>
            </div>
          </div>




          <div class="form-group">

          </div>
          <div class="form-group">

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="crearProveedor" class="btn btn-info">Crear proveedor </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan


