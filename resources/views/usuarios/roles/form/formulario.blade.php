<div id="modalName" class="modal-body">
  <div class="form-group">
    {{ Form::hidden('id', null, ['id' => 'idRol']) }}
  	{{ Form::label('name', 'Nombre del rol *') }}
  	{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'required' => 'required']) }}
  </div>
  <div class="form-group">
  	{{ Form::label('slug', 'URL Amigable *') }}
  	{{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug' ,'required' => 'required']) }}
  </div>
  <div class="form-group">
  	{{ Form::label('description', 'Descripción') }}
  	{{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3, 'cols' => 3]) }}
  </div>
  <hr>
  <h3>Permiso especial</h3>
  <div class="form-group">
   	<label>{{ Form::radio('special', 'all-access') }} Acceso total</label>
   	<label>{{ Form::radio('special', 'no-access') }} Ningún acceso</label>
  </div>
  <hr>
  <h3>Lista de permisos</h3>

  {{-- Permisos para usuario --}}
    <div id="color1" class="card card-outline card-info collapsed-card">
      <div class="card-header">
        <h3 class="card-title">Usuario: crear, mostrar, editar y eliminar.</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool">
            <input id="switch1" class="switch" type="checkbox">
            <label for="switch1" class="lbl align-middle"></label>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
          </button>
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        @foreach($permissions as $permission)
          @if($permission->categoria == 'usuario')
          <div id="todoUsuario" class="form-group clearfix">
            <div class="icheck-success">
              {{ Form::checkbox('permissions[]', $permission->id, null, ['id' => 'checkboxSuccess'.$permission->id]) }}
              {{ Form::label('checkboxSuccess'.$permission->id, $permission->name) }}

            </div>
          </div>
          @endif
        @endforeach
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <label>Nota:</label>
      </div>
      <!-- /.card-footer-->
    </div>

  {{-- Permisos para ubicacion --}}
    <div id="color2" class="card card-outline card-info collapsed-card">
      <div class="card-header">
        <h3 class="card-title">Ubicacion: crear, mostrar, editar y eliminar.</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool">
            <input id="switch2" class="switch" type="checkbox">
            <label for="switch2" class="lbl align-middle"></label>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
          </button>
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        @foreach($permissions as $permission)
          @if($permission->categoria == 'ubicacion')
          <div id="todoUbicacion" class="form-group clearfix">
            <div class="icheck-success">
              {{ Form::checkbox('permissions[]', $permission->id, null, ['id' => 'checkboxSuccess'.$permission->id]) }}
              {{ Form::label('checkboxSuccess'.$permission->id, $permission->name) }}

            </div>
          </div>
          @endif
        @endforeach
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <label>Nota:</label>
      </div>
      <!-- /.card-footer-->
    </div>

  {{-- Permisos para productos --}}
    <div id="color3" class="card card-outline card-info collapsed-card">
      <div class="card-header">
        <h3 class="card-title">Productos: crear, mostrar, editar y eliminar.</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool">
            <input id="switch3" class="switch" type="checkbox">
            <label for="switch3" class="lbl align-middle"></label>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
          </button>
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        @foreach($permissions as $permission)
          @if($permission->categoria == 'productos')
          <div id="todoProductos" class="form-group clearfix">
            <div class="icheck-success">
              {{ Form::checkbox('permissions[]', $permission->id, null, ['id' => 'checkboxSuccess'.$permission->id]) }}
              {{ Form::label('checkboxSuccess'.$permission->id, $permission->name) }}

            </div>
          </div>
          @endif
        @endforeach
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <label>Nota:</label>
      </div>
      <!-- /.card-footer-->
    </div>

  {{-- Permisos para compras --}}
    <div id="color4" class="card card-outline card-info collapsed-card">
      <div class="card-header">
        <h3 class="card-title">Compras: crear, mostrar, editar y eliminar.</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool">
            <input id="switch4" class="switch" type="checkbox">
            <label for="switch4" class="lbl align-middle"></label>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
          </button>
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        @foreach($permissions as $permission)
          @if($permission->categoria == 'compras')
          <div id="todoCompras" class="form-group clearfix">
            <div class="icheck-success">
              {{ Form::checkbox('permissions[]', $permission->id, null, ['id' => 'checkboxSuccess'.$permission->id]) }}
              {{ Form::label('checkboxSuccess'.$permission->id, $permission->name) }}

            </div>
          </div>
          @endif
        @endforeach
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <label>Nota:</label>
      </div>
      <!-- /.card-footer-->
    </div>
    
  <div class="form-group">
    {{ Form::submit('Guardar', ['id' => 'roles', 'class' => 'btn btn-primary']) }}
  </div>
</div>