
@can('crear.porcentaje')
{{-- Modal para registro de un nuevo porcentaje --}}
<div class="modal fade" id="modal-crear" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fas fa-plus"></i> Registrar un Porcentaje</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">
          <div class="form-group">
            <label for="nombrePais"> Nombre (*) </label>


    <input id="nombreporcentaje" class="form-control focus" type="text" placeholder="Nombre" required="">
          </div>
          <div class="form-group">
            <label for="descripcionporcentaje"> Descripción </label>
            <textarea id="descripcionporcentaje" class="form-control focus" rows="3" placeholder="Agregue una descripción"></textarea>
          </div>
          <div class="form-group">
            <label for="porcentaje"> Porcentaje (*)</label>
            <input id="porcentaje" class="form-control focus" type="number" placeholder="Porcentaje" required="">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="crearPorcentaje" class="btn btn-info">Crear Porcentaje </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan
