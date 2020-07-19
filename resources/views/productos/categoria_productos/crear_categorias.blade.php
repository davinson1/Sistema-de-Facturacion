
@can('crear.porcentaje')
{{-- Modal para registro de un nuevo porcentaje --}}
<div class="modal fade" id="modal-crear" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="fas fa-plus"></i> Registrar una categoria</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">
          <div class="form-group">
            <label for="nombrecategoriap"> Nombre (*) </label>
            <input id="nombrecategoriap" class="form-control" type="text"  placeholder="Nombre categoria" required="">
          </div>
          <div class="form-group">
            <label for="descripcioncategoriap"> Descripción </label>
            <textarea id="descripcioncategoriap" class="form-control focus" rows="3" placeholder="Agregue una descripción"></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" tabindex="3">Cerrar</button>
          <button type="submit" id="crearcategoriap" class="btn btn-info" tabindex="4">Crear Categoria </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan
