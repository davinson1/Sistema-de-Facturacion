@can('editar.producto')
{{-- Modal para registro de un nuevo porcentaje --}}
<div class="modal fade" id="modal-editar" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fas fa-edit"></i> Editar Producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">
          <div class="form-group">
            <label for="editnombreproducto"> Nombre (*) </label>
            <input id="idproducto" class="form-control" type="hidden" required="">
            <input id="editnombreproducto" class="form-control focus" type="text" placeholder="Nombre" required="">
          </div>
          <div class="form-group">
            <label for="editespecificaciones"> Especificaciones </label>
            <textarea id="editespecificaciones" class="form-control focus" rows="3" placeholder="Agregue una Especificacion"></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="editarproducto" class="btn btn-info">Editar Producto </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan
