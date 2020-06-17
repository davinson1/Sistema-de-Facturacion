@can('crear.productos')
  {{-- Modal para registro de articulo --}}
  <div class="modal fade" id="modal-crear" >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title"><i class="fas fa-plus"></i> Registrar producto</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        @csrf
        <form id="frmCrearProducto" enctype="multipart/form-data">
          <div class="modal-body">            
            <div class="row mb-3">
              <div class="col-6 mx-auto">
                <img id="img1" src="/img/social.png" class="mb-3 rounded mx-auto d-block " alt="Foto del producto" width="150" height="150">
                <div class="custom-file">
                  <label class="custom-file-label" for="customFileLang">Foto del producto</label>
                  <input type="file" class="custom-file-input" id="customFileLang" name="fotoProducto" lang="es" accept="image/png, .jpeg, .jpg, image/gif">
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6">
                <label for="idTipoArticulo">Seleccione tipo de artículo (*)</label>
                <select id="idTipoArticulo" class="form-control select-producto" name="tipoArticulo" required="">
                  @foreach ($tipoArticulos as $tipoArticulo)
                    <option value="{{$tipoArticulo->id}}">{{$tipoArticulo->nombre}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-6">
                <label for="idProveedor">Seleccione el proveedor (*)</label>
                <select id="idProveedor" class="form-control select-producto" name="tipoProveedor" required="">
                  @foreach ($proveedores as $proveedor)
                    <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6">
                <label for="nombreProducto">Nombre del producto (*)</label>
                <input id="nombreProducto" class="form-control" type="text" name="nombreProducto" required="">
              </div>
              <div class="col-6">
                <label for="valorCompraProducto">Valor de compra del producto (*)</label>
                <input id="valorCompraProducto" class="form-control" type="number" name="valorCompraProducto" required="" step="5">
              </div>              
            </div>
            <div class="row mb-3">
              <div class="col-6">
                <label for="valorEnvioProducto">Valor de envio del producto (*)</label>
                <input id="valorEnvioProducto" class="form-control" type="number" name="valorEnvioProducto" required="">
              </div>
              <div class="col-6">
                <label for="porcentajeMinimoProducto">Porcentaje mínimo (*)</label>
                <input id="porcentajeMinimoProducto" class="form-control" type="number" name="porcentajeMinimoProducto" required="">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6">
                <label for="idPorcentaje">Seleccione el porcentaje (*)</label>
                <select id="idPorcentaje" class="form-control select-producto" name="tipoPorcentaje" required="">
                  @foreach ($porcentajes as $porcentaje)
                    <option value="{{$porcentaje->id}}">{{$porcentaje->nombre}} ({{ $porcentaje->porcentaje }}%)</option>
                  @endforeach
                </select>
              </div>
              <div class="col-6">
                <label for="codigoBarrasProducto">Código de barras (*)</label>
                <input id="codigoBarrasProducto" class="form-control" type="text" name="codigoBarrasProducto" required="">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-12">
                <label for="descripcionProducto">Descripción (*)</label>
                <textarea id="descripcionProducto" class="form-control" name="descripcionProducto"></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" id="crearProducto" class="btn btn-info">Crear producto </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endcan