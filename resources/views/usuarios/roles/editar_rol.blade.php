{!! Form::model($rol, ['route' => ['roles_actualizar', $rol->id],'method' => 'PUT', 'id' =>'frm_editar_rol']) !!}
    @include('usuarios.roles.form.formulario')
    <div class="form-group">
      {{ Form::submit('Guardar', ['id' => 'actualizarRol', 'class' => 'btn btn-sm btn-primary']) }}
    </div>
{{ Form::close() }}