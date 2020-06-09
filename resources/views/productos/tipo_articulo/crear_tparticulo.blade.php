@can('crear.tipoarticulo')
{{-- Modal para registro de un nuevo porcentaje --}}
<div class="modal fade" id="modal-crear" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fas fa-plus"></i> Registrar un tipo de articulo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">
          <div class="form-group">
            <label for="nombretparticulo"> Nombre (*) </label>
            <input id="nombretparticulo" class="form-control focus" type="text" placeholder="Nombre" required="">
          </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="crearTpoArticulo" class="btn btn-info">Crear Porcentaje </button>
        </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan