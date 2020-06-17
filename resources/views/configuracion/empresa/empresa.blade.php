@extends('layouts.app')
@section('titulo')
Datos empresa
@endsection
@section('menu-open-configuracion')
menu-open
@endsection
@section('active-datosempresa')
active
@endsection
@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-cog"></i> Datos empresa</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">Datos de empresa</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<!-- /.content-header -->
<div class="content">
<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Datos de Empresa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

@if($dato =='[]')
                <div class="card-body">
                <form role="form" id="frm-DatosEmpresa" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <input type="hidden" class="form-control" id="cidempresa" name="cidempresa" required="" value="">

                        <label>Nombre de la empresa (*)</label>
                        <input type="text" class="form-control" placeholder="Nombre" id="cnombreEmpresa" name="cnombreEmpresa" value="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nit</label>
                        <input type="number" class="form-control" placeholder="Nit" id="cnitEmpresa" name="cnitEmpresa" value="">
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Régimen</label>
                        <input type="text" class="form-control" placeholder="Tipo de Régimen" id="cregimen" name="cregimen" value="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Reso Dian</label>
                        <input type="text" class="form-control" placeholder="Dian" id="cdian" name="cdian" value="">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Representación legal</label>
                        <input type="text" class="form-control" placeholder="Representación" id="crepresentacionl" name="crepresentacionl" value="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Dirección</label>
                        <input type="text" class="form-control" placeholder="Dirección" id="cdireccion" name="cdireccion" value="">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Número de teléfono</label>
                        <input type="number" class="form-control" placeholder=" Número de teléfono" id="ctelefono" name="ctelefono" value="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Cuidad</label>
                        <input type="text" class="form-control" placeholder="Cuidad" id="cciudad" name="cciudad"
                        value="" >
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Ofrece</label>
                        <textarea id="cofrece"  name="cofrece" class="form-control focus" rows="3" placeholder="Descripción de qué ofrece">
                        </textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nombre Empresa 2</label>
                        <input type="text" class="form-control" placeholder="Nombre empresa 2" id="cnombre2" name="cnombre2" value="">
                      </div>
                    </div>
                  </div>

          <div class="row mb-3">
          <div class="col-6 mx-auto">
            <img id="img1" name="img1" src="/img/social.png" class="mb-3 rounded mx-auto d-block " alt="Foto del usuario" width="200" height="200">

            <div class="custom-file">
              <label class="custom-file-label" for="customFileLang">Cambiar foto</label>
              <input type="file" name="clogo" class="custom-file-input" id="customFileLang"  lang="es" accept="image/png, .jpeg, .jpg, image/gif" name="archivofoto">
            </div>
          </div>
        </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-info" id="gdatosempresa">Guardar</button>
                </div>
              </form>
            </div>

@else

                <div class="card-body">
                <form role="form" id="frm-DatosEmpresaActualizar" enctype="multipart/form-data">
                  <div class="row mb-3">
          <div class="col-6 mx-auto">
          @if(!$dato[0]->logo)
            <img id="img1" name="img1" src="/img/social.png" class="mb-3 rounded mx-auto d-block " alt="Foto del usuario" width="200" height="200"> @else
            <img id="img1"  src="{{ Storage::url($dato[0]->logo) }}" class="mb-3 rounded mx-auto d-block " alt="Foto del usuario" width="200" height="200">
            @endif
            <div class="custom-file">
              <label class="custom-file-label" for="customFileLang">Cambiar foto</label>
              <input type="file" name="clogo" class="custom-file-input" id="customFileLang"  lang="es" accept="image/png, .jpeg, .jpg, image/gif" name="archivofoto">
            </div>
          </div>
        </div>


                  <div class="row">


                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <input type="hidden" class="form-control" id="cidempresa" name="cidempresa" required="" value="{{$dato[0]->id}}">
                        <label>Nombre de la empresa (*)</label>
                        <input type="text" class="form-control" placeholder="Nombre" id="cnombreEmpresa" name="cnombreEmpresa" value="{{$dato[0]->nombre}}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nit</label>
                        <input type="number" class="form-control" placeholder="Nit" id="cnitEmpresa" name="cnitEmpresa" value="{{$dato[0]->nit}}" >
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Régimen</label>
                        <input type="text" class="form-control" placeholder="Tipo de Régimen" id="cregimen" name="cregimen" value="{{$dato[0]->regimen}}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Reso Dian</label>
                        <input type="text" class="form-control" placeholder="Dian" id="cdian" name="cdian" value="{{$dato[0]->reso_dian}}">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Representación legal</label>
                        <input type="text" class="form-control" placeholder="Representación" id="crepresentacionl" name="crepresentacionl" value="{{$dato[0]->representacion_legal}}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Dirección</label>
                        <input type="text" class="form-control" placeholder="Dirección" id="cdireccion" name="cdireccion" value="{{$dato[0]->direccion}}">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Número de teléfono</label>
                        <input type="number" class="form-control" placeholder=" Número de teléfono" id="ctelefono" name="ctelefono" value="{{$dato[0]->telefono}}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Cuidad</label>
                        <input type="text" class="form-control" placeholder="Cuidad" id="cciudad" name="cciudad"
                        value="{{$dato[0]->ciudad}}" >
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Ofrece</label>
                        <textarea id="cofrece"  name="cofrece" class="form-control focus" rows="3" placeholder="Descripción de qué ofrece">{{$dato[0]->ofrece}}
                        </textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nombre Empresa 2</label>
                        <input type="text" class="form-control" placeholder="Nombre empresa 2" id="cnombre2" name="cnombre2" value="{{$dato[0]->nombre_empresa_2}}">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-info" id="gdatosempresa">Guardar</button>
                </div>
              </form>
            </div>

@endif
</div>
@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/configuracion/datosempresa_ajax.js"></script>

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



  </script>
@endsection