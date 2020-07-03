{!! Form::model($empresa, ['route' => ['empresa_actualizar', $empresa->id], 'method' => 'PUT', 'id' =>'frm_editar_empresa']) !!}
  <div class="modal-body">
    <div class="row mb-3">
      <div class="col-6">
        <label for="idTipoTributario">Seleccione tipo tributario (*)</label>
        {{ Form::select('id_tipo_tributario', $tipoTributario, null, array('class'=>'form-control select-empresa')) }}
      </div>
      <div class="col-6">
        <label for="idMunicipios">Seleccione el municipio (*)</label> 
        {{ Form::select('id_municipio', $municipios, null, array('class'=>'form-control select-empresa')) }}
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-6">                
        <label for="nombreEmpresa">Nombre de la empresa (*)</label>
        {{ Form::text('nombre', null, ['class' => 'form-control focus', 'id' => 'nombreEmpresa']) }}
      </div>
      <div class="col-6">
        <label for="numeroEmpresa">Nit (*)</label>
        {{ Form::text('numero', null, ['class' => 'form-control', 'id' => 'numeroEmpresa']) }}
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-6">
        <label for="direccionEmpresa">Dirección (*)</label>
        {{ Form::text('direccion', null, ['class' => 'form-control', 'id' => 'direccionEmpresa']) }}
      </div>
      <div class="col-6">
        <label for="telefonoEmpresa">Teléfono fijo (*)</label>
        {{ Form::text('telefono', null, ['class' => 'form-control', 'id' => 'telefonoEmpresa']) }}                
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-6">
        <label for="celularEmpresa">Celular de la empresa (*)</label>
        {{ Form::text('celular', null, ['class' => 'form-control', 'id' => 'celularEmpresa']) }}
      </div>
      <div class="col-6">
        <label for="nombreJefeEmpresa">Nombre del jefe (*)</label>
        {{ Form::text('nombre_jefe', null, ['class' => 'form-control', 'id' => 'nombreJefeEmpresa']) }}                
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-6">
        <label for="celularJefeEmpresa">Celular del jefe (*)</label>
        {{ Form::text('celular_jefe', null, ['class' => 'form-control', 'id' => 'celularJefeEmpresa']) }}                
      </div>
      <div class="col-6">
        <label for="fechaCreadaEmpresa">Fecha de creación de la empresa (*)</label>
        {{ Form::date('fecha_creacion', null, ['class' => 'form-control', 'id' => 'fechaCreadaEmpresa', 'max' => date('Y-m-d') ]) }}
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-6">
        <label for="descripcionEmpresa">Descripción:</label>
        {{ Form::textarea('descripcion', null, ['class' => 'form-control', 'id' => 'descripcionEmpresa', 'cols' => '3', 'rows' => '3']) }}  
      </div>
      <div class="col-6">
        <label>Estado de la empresa:</label>        
        <div class="form-check">
          {{ Form::radio('estado', '1', null, ['class'=> 'form-check-input', 'id' => 'radioActivo']) }}
          <label class="form-check-label" for="radioActivo">Activa</label>
        </div>
        <div class="form-check">
          {{ Form::radio('estado', '0', null, ['class'=> 'form-check-input', 'id' => 'radioInactivo']) }}
          <label class="form-check-label" for="radioInactivo">Inactiva</label>
        </div>
      </div>
    </div>
    <div class="form-group text-center">
      {{ Form::submit('Actualizar', ['id' => 'actualizarEmpresa', 'class' => 'btn btn-primary']) }}
    </div>
  </div>
{!! Form::close() !!}
<script type="text/javascript">
  // Selectores de busqueda
  $('.select-empresa').select2({
    theme: 'bootstrap4',
  });
  $('#actualizarEmpresa').click(function(e) {
    e.preventDefault();
    var datos = $('#frm_editar_empresa').serialize();
    const url = $('#frm_editar_empresa').attr('action');

    $.ajax({
      url: url,
      method: 'put',
      data: datos,

      success: function(response){
        toastr.success(response.mensaje);
        $(".close").click();
        listarEmpresa();
      },
      error: function(error) {
        callback(500, error);
      }
    });
  });
</script>