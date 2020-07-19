
@can('editar.categoria.productos')
{{-- Modal para editar de un nuevo porcentaje --}}
<div class="modal fade" id="modal-editar" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fas fa-plus"></i> Editar una categoria</h4>
        <button type="button" class="close cerrarcpe" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">
          <div class="form-group">
            <label for="editarnombrecategoriap"> Nombre (*) </label>
            <input id="editaridcategoriap" class="form-control" type="hidden" tabindex="1" required="">
            <input id="editarnombrecategoriap" class="form-control focus" type="text" tabindex="1" placeholder="Nombre categoria" required="">

        </div>
          <div class="form-group">
            <label for="editardescripcioncategoriap"> Descripción </label>
            <textarea id="editardescripcioncategoriap" class="form-control focus" rows="3" tabindex="2" placeholder="Agregue una descripción"></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" tabindex="3">Cerrar</button>
          <button type="submit" id="editarcategoriaps" class="btn btn-info" tabindex="4">Editar Categoria </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan
