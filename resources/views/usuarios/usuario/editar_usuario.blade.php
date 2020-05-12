<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Datos del usuario</h3>

<button id="regresar" type="button" class="btn btn-default float-right">
        <i class="fas fa-angle-double-left"></i>
        Regresar
      </button>

  </div>
  <div class="card-body">
    {!! Form::model($user, ['id' =>'frmEditarUsuario', 'enctype' => 'multipart/form-data']) !!}
    <input id="idUsuario" type="hidden" value="{{ $user->id }}">
      <div class="row mb-3">
        <div class="col-6 mx-auto">
          <img id="img1" src="{{ Storage::url($user->foto) }}" class="mb-3 rounded mx-auto d-block" alt="Foto del usuario" width="200" height="200">
          <div class="custom-file">
            <label class="custom-file-label" for="customFileLang">Cambiar foto</label>
            <input type="file" class="custom-file-input" id="customFileLang" name="foto" lang="es" accept="image/png, .jpeg, .jpg, image/gif" name="archivofoto">
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-6">
          <label for="idTipoDocumento">Seleccione el documento (*)</label>
          <select id="idTipoDocumento" class="custom-select form-control" name="tipoDocumento" required="">            
            <option id="documentoSeleccionado" onfocus="" value="{{ $user->tipoDocumento->id }}">{{ $user->tipoDocumento->nombre }}</option>            
            <optgroup label="Documentos">
              @foreach ($tiposDocumento as $tipoDoc)
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
          <label for="copiaDocumento">Copia de documento</label>
          <a target="_blank" class="btn btn-default form-control" href="{{ Storage::url($user->copia_documento) }}"><i class="fas fa-external-link-alt"></i> Ver documento</a>
        </div>
      </div>

      <div class="row mb-3">        
        <div class="col-6">
          <label for="claveUsusario">Contraseña (*)</label>
          <input id="claveUsusario" class="form-control" type="password" name="claveUsusario" placeholder="Nueva contraseña (Opcional)">
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
$('.custom-file-input').on('change', function(event) {
    var inputFile = event.currentTarget;
    $(inputFile).parent()
        .find('.custom-file-label')
        .html(inputFile.files[0].name);
  });

  function readFile(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
        reader.onload = function (e) {            
          $('#img1').attr("src", e.target.result);
        }
      reader.readAsDataURL(input.files[0]);
    }
  }
  document.getElementById('customFileLang').onchange = function (e) {
    readFile(e.srcElement);
  }

$('#regresar').click(function(){
    $("#ListarUsuarios").load("listar_usuarios");
  });

  $("#frmEditarUsuario").submit(function(ev){    
    var idUser = $('#idUsuario').val();
    $.ajax({
      url: 'actualizar_usuarios/'+idUser,
      type: 'POST',
      data: new FormData(this),
      contentType: false,
      processData: false,
      cache: false,
      success: function(response){ // En caso de que todo salga bien.
        toastr.success(response.mensaje);
        console.log(response.mensaje);
      },
      error: function(eerror) {
        var array = Object.values(eerror.responseJSON.errors);
        array.forEach(element => toastr.error(element));

       }

    });
    ev.preventDefault();
  });
</script>