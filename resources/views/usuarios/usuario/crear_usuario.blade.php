<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Datos del usuario</h3>
  </div>
  <div class="card-body">
    {{ Form::open(['route' => 'crear_usuarios']) }}
      <div class="row">
        <div class="col-6">
          <label for="idTipoDocumento">Seleccione el documento</label>
          <select id="idTipoDocumento" class="custom-select mb-3 form-control">
            @foreach ($tipoDocumento as $tipoDoc)
              <option value="{{$tipoDoc->id}}">{{$tipoDoc->nombre}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-6">
          <label for="idMunicipios">Seleccione el municipio</label>
          <select id="idMunicipios" class="custom-select mb-3 form-control">
            @foreach ($municipios as $municipio)
              <option value="{{$municipio->id}}">{{$municipio->nombre}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-6">
          {{ Form::label('nombreUsusario', 'Nombre del usuario') }}
          {{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombreUsusario', 'required' => 'required']) }}
        </div>
        <div class="col-6">
          {{ Form::label('apellidoUsusario', 'Apellido del usuario') }}
          {{ Form::text('apellido', null, ['class' => 'form-control', 'id' => 'apellidoUsusario']) }}
        </div>
      </div>

      <div class="row">
        <div class="col-6">
          {{ Form::label('documentoUsusario', 'Numero de documento') }}
          {{ Form::number('documento', null, ['class' => 'form-control', 'id' => 'documentoUsusario']) }}
        </div>
        <div class="col-6">
          {{ Form::label('direccionUsusario', 'Dirección') }}
          {{ Form::text('direccion', null, ['class' => 'form-control', 'id' => 'direccionUsusario']) }}
        </div>
      </div>

      <div class="row">
        <div class="col-6">
          {{ Form::label('emailUsusario', 'Email') }}
          {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'emailUsusario']) }}
        </div>
        <div class="col-6">
          {{ Form::label('imagenUsuario', 'Foto del usuario') }}
          {{ Form::file('image', ['class' => 'form-control', 'id' => 'imagenUsuario'])}}
        </div>
      </div>

      <div class="row">
        <div class="col-6">
          {{ Form::label('copiaDocumento', 'Copia del documento') }}
            {{ Form::file('image', [ 'class' => 'form-control', 'id' => 'copiaDocumento']) }}
        </div>
        <div class="col-6">
          {{ Form::label('claveUsusario', 'Contraseña') }}
          {{ Form::password('clave', ['class' => 'form-control', 'id' => 'claveUsusario']) }}
        </div>
      </div>
      <hr>
      <h3>Lista de roles</h3>
      <div class="form-group">
        <ul class="list-unstyled">
          @foreach($roles as $role)
            <li>
                <label>
                {{ Form::checkbox('roles[]', $role->id, null) }}
                {{ $role->name }}
                <em>({{ $role->description ?: 'Sin descripción' }})</em>
                </label>
            </li>
            @endforeach
          </ul>
      </div>
      <div class="form-group">
        {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
      </div>
    {{ Form::close() }}
  </div>
  <!-- /.card-body -->      
</div>
<!-- /.card -->