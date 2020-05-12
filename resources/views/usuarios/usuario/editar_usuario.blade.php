<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Datos del usuario</h3>

<button id="regresar" type="button" class="btn btn-default float-right">
        <i class="fas fa-angle-double-left"></i>
        Regresar
      </button>

  </div>
  <div class="card-body">
    {!! Form::model($user, ['id' =>'frm_editar_usuario', 'enctype' => 'multipart/form-data']) !!}
      <div class="row mb-3">
        <img src="{{ Storage::url($user->foto)}} " class="img-circle elevation-2 image" alt="User Image" width="100px" height="100px">
      </div>
      <div class="row mb-3">
        <div class="col-6">
          <label for="idTipoDocumento">Seleccione el documento (*)</label>
          <select id="idTipoDocumento" class="custom-select form-control" name="tipoDocumento" required="">            
            <option id="documentoSeleccionado" onfocus="" value="{{ $user->tipoDocumento->id }}">{{ $user->tipoDocumento->nombre }}</option>            
            <optgroup label="Documentos">
              @foreach ($tiposDocumento as $tipoDoc)
              <option>Seleccione un tipo de documento</option>
                <option value="{{$tipoDoc->id}}">{{$tipoDoc->nombre}}</option>
              @endforeach
            </optgroup>
          </select>
        </div>
        <div class="col-6">
          <label for="idMunicipios">Seleccione el municipio (*)</label>
          <select id="idMunicipios" class="custom-select form-control" name="municipio" required="">
            <option id="documentoSeleccionado" onfocus="" value="{{ $user->municipio->id }}">{{ $user->municipio->nombre }}</option>
              <optgroup label="Municipios">
                @foreach ($municipios as $municipio)
                  <option value="{{$municipio->id}}">{{$municipio->nombre}}</option>
                @endforeach
              </optgroup>
          </select>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-6">
          <label for="nombreUsusario">Nombre del usuario (*)</label>
          <input id="nombreUsusario" class="form-control" type="text" name="nombreUsusario" required="" value="{{ $user->name }}">
        </div>
        <div class="col-6">
          <label for="apellidoUsusario">Apellido del usuario (*)</label>
          <input id="apellidoUsusario" class="form-control" type="text" name="apellidoUsusario" required="" value="{{ $user->apellido }}">
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-6">
          <label for="documentoUsusario">Número de documento (*)</label>
          <input id="documentoUsusario" class="form-control" type="number" name="documentoUsusario" required="" value="{{ $user->numero_documento }}">
        </div>
        <div class="col-6">
          <label for="direccionUsusario">Dirección</label>
          <input id="direccionUsusario" class="form-control" type="text" name="direccionUsusario" value="{{ $user->direccion }}">
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-6">
          <label for="emailUsusario">Correo electrónico (*)</label>
          <input id="emailUsusario" class="form-control" type="email" name="emailUsusario" required="" value="{{ $user->email }}">
        </div>
        <div class="col-6">
          <label for="fotoUsuario">Foto del usuario</label>
          <input id="fotoUsuario" class="form-control" type="file" name="fotoUsuario">
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-6">
          <label for="copiaDocumento">Copia de documento</label>
          <input id="copiaDocumento" class="form-control" type="file" name="copiaDocumento">
        </div>
        <div class="col-6">
          <label for="claveUsusario">Contraseña (*)</label>
          <input id="claveUsusario" class="form-control" type="password" name="claveUsusario" required="" value="*****">
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
        <button type="submit" id="crearUsuario" class="btn btn-primary">Crear usuario</button>
      </div>
    {{ Form::close() }}
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
<script type="text/javascript">

$('#regresar').click(function(){
    $("#ListarUsuarios").load("listar_usuarios");
  });

  $("#frmCrearUsuario").submit(function(ev){
    $.ajax({
      url: 'crear_usuarios',
      type: 'POST',
      data: new FormData(this),
      contentType: false,
      processData: false,
      cache: false,
      success: function(response){ // En caso de que todo salga bien.
        toastr.success(response.mensaje);
        console.log(response.mensaje);
        $("#nombreUsusario").val('');
        $("#apellidoUsusario").val('');
        $("#documentoUsusario").val('');
        $("#direccionUsusario").val('');
        $("#direccionUsusario").val('');
        $("#emailUsusario").val('');
        $("#fotoUsuario").val('');
        $("#copiaDocumento").val('');
        $("#claveUsusario").val('');
      },
      error: function(eerror) {
        var array = Object.values(eerror.responseJSON.errors);
        array.forEach(element => toastr.error(element));

       }

    });
    ev.preventDefault();
  });
</script>