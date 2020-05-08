
{!! Form::model($rol, ['route' => ['roles_actualizar', $rol->id], 'method' => 'PUT', 'id' =>'frm_editar_rol']) !!}
    @include('usuarios.roles.form.formulario')
    <div class="form-group">
      {{ Form::submit('Guardar', ['id' => 'actualizarRol', 'class' => 'btn btn-sm btn-primary']) }}
    </div>
{{ Form::close() }}
<script type="text/javascript">

  $('#actualizarRol').click(function(e) {
  e.preventDefault();
  var datos = $('#frm_editar_rol').serialize();
  const url = $('#frm_editar_rol').attr('action');

  $.ajax({
    url: url,
    method: 'put',
    data: datos,

    success: function(response){
      toastr.success(response.mensaje);
      $(".close").click();
      listaRoles();
    },
    error: function(error) {
      callback(500, error);
    }
  });
});
</script>