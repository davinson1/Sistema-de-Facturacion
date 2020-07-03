@can('crear.empresa')
  {{-- Modal para registro de empresa --}}
  <div class="modal fade" id="modal-crear" >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title"><i class="fas fa-plus"></i> Registrar empresa</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        @csrf
        <form id="frm_crear_empresa">
          <div class="modal-body">
            <div class="row mb-3">
              <div class="col-6">
                <label for="idTipoTributario">Seleccione tipo tributario (*)</label>
                <select id="idTipoTributario" class="form-control select-empresa" required="" name="id_tipo_tributario">
                  @foreach ($tipoTributario as $tipoTri)
                    <option value="{{$tipoTri->id}}">{{$tipoTri->nombre}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-6">
                <label for="idMunicipios">Seleccione el municipio (*)</label>
                <select id="idMunicipios" class="form-control select-empresa" required="" name="id_municipio">
                  @foreach ($municipios as $municipio)
                    <option value="{{$municipio->id}}">{{$municipio->nombre}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-6">
                <label for="nombreEmpresa">Nombre de la empresa (*)</label>
                <input id="nombreEmpresa" class="form-control focus" type="text" required="" name="nombre">
              </div>
              <div class="col-6">
                <label for="numeroEmpresa">Nit (*)</label>
                <input id="numeroEmpresa" class="form-control" type="text" required="" name="numero">
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-6">
                <label for="direccionEmpresa">Dirección (*)</label>
                <input id="direccionEmpresa" class="form-control" type="text" required="" name="direccion">
              </div>
              <div class="col-6">
                <label for="telefonoEmpresa">Teléfono fijo (*)</label>
                <input id="telefonoEmpresa" class="form-control" type="text" required="" name="telefono">
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-6">
                <label for="celularEmpresa">Celular de la empresa (*)</label>
                <input id="celularEmpresa" class="form-control" type="text" required="" name="celular">
              </div>
              <div class="col-6">
                <label for="nombreJefeEmpresa">Nombre del jefe (*)</label>
                <input id="nombreJefeEmpresa" class="form-control" type="text" required="" name="nombre_jefe">
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-6">
                <label for="celularJefeEmpresa">Celular del jefe (*)</label>
                <input id="celularJefeEmpresa" class="form-control" type="text" required="" name="celular_jefe">
              </div>
              <div class="col-6">
                <label for="fechaCreadaEmpresa">Fecha de creación de la empresa (*)</label>
                <input id="fechaCreadaEmpresa" class="form-control" type="date" required="" max="{{ date('Y-m-d') }}" name="fecha_creacion">
              </div>
            </div>

            <div class="form-group">
              <label for="descripcionEmpresa">Descripción:</label>
              <textarea id="descripcionEmpresa" class="form-control" name="descripcion"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" id="crearEmpresa" class="btn btn-info">Crear empresa</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endcan
