@can('editar.porcentaje')
{{-- Modal para registro de un nuevo porcentaje --}}
<div class="modal fade" id="modal-editar" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fas fa-plus"></i> Editar Porcentaje</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">
          <div class="form-group">
            <label for="editnombreporcentaje"> Nombre (*) </label>
            <input id="idporcentaje" class="form-control" type="hidden" required="">
            <input id="editnombreporcentaje" class="form-control focus" type="text" placeholder="Nombre" required="">
          </div>
          <div class="form-group">
            <label for="editdescripcionporcentaje"> Descripción </label>
            <textarea id="editdescripcionporcentaje" class="form-control focus" rows="8" placeholder="Agregue una descripción"></textarea>
          </div>
          <div class="form-group">
            <label for="editporcentaje"> Porcentaje (*)</label>
            <input id="editporcentaje" class="form-control focus" type="number" placeholder="Porcentaje" required="">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="editarPorcentaje" class="btn btn-info">Editar Porcentaje </button>
        </div>

        </div>
      </form>
    </div>
  </div>
</div>
@endcan
