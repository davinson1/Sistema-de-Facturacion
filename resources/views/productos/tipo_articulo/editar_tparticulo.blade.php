@can('editar.tipoarticulo')
{{-- Modal para registro de un nuevo porcentaje --}}
<div class="modal fade" id="modal-editar" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fas fa-plus"></i> editar un tipo de articulo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @csrf
      <form>
        <div class="modal-body">
          <div class="form-group">
            <label for="editnombretparticulo"> Nombre (*) </label>
            <input id="editidtparticulo" class="form-control focus" type="hidden"required="">
            <input id="editnombretparticulo" class="form-control focus" type="text" placeholder="Nombre" required="">
          </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="editarTipoArticulo" class="btn btn-info">Editar Porcentaje </button>
        </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan