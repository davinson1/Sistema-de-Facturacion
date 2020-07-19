
@can('eliminar.categoria.productos')
{{-- Modal para Eliminar un tipo tributario --}}
<div class="modal fade" id="modal-eliminar" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title"><i class="fa fa-trash"></i> Eliminar Categoria de productos</h4>
        <button type="button" class="close cerrarcps" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @csrf
      <form>
        <div class="modal-body">
          <h3 class="text-center">¿Esta seguro de eliminar la categoria <span id="nombrecategoriaps"></span>?</h3>
          <input id="idcategoriap" class="form-control" type="hidden" required="" value="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button id="eliminarcategoriap" class="btn btn-danger" type="submit" tabindex="0">Eliminar </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan
