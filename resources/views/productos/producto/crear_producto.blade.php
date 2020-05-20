
@can('crear.producto')
{{-- Modal para registro de un nuevo porcentaje --}}
<div class="modal fade" id="modal-crear" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fas fa-plus"></i> Registrar un Producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">
          <div class="form-group">
            <label for="nombreproducto"> Nombre (*) </label>
            <input id="nombreproducto" class="form-control focus" type="text" placeholder="Nombre" required="">
          </div>
          <div class="form-group">
            <label for="especificaciones"> Especificaciones </label>
            <textarea id="especificaciones" class="form-control focus" rows="3" placeholder="Agregue una especificacion"></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="crearproducto" class="btn btn-info">Crear Producto </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan
