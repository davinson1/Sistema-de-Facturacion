<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>sesión</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" type="text/css" href="/css/login.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page" >

  <div class="login-box">

    <!-- /.login-logo -->
    <div class="card ">
      <div class="card-body login-card-body ">
          <div class="login-logo">
      <a href="#"><b >FACTURACIÓN 2020</b></a>
    </div>
        <p class="login-box-msg">Inicia sesión</p>


        @error('email')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ $message }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @enderror


        <form action="{{ route('login') }}" method="post">
          @csrf


          <div class="input-group mb-3 ">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
              value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo Electronico">

            <div class="input-group-append">
                 <button id="" class="btn btn-info" type="button" > <span class="fa fa-envelope"></span> </button>
              </div>

          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control password" placeholder="Contraseña"
              class="form-control @error('password') is-invalid @enderror" name="password" required
              autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            {{-- <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div> --}}
               <div class="input-group-append" >
                 <button id="ocpassword" class="btn btn-info" type="button" > <span class="fa fa-eye-slash icono" alt="ver contraseña"></span> </button>
              </div>

          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                  {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                  {{ __('Recordar usuario y contraseña') }}
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">

              <button type="submit" class="btn btn-info btn-block">
                {{ __('Iniciar') }}
              </button>
            </div>
            <!-- /.col -->
          </div>
        </form>



        <p class="mb-1">
          @if (Route::has('password.request'))
          <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Olvidó su  contraseña?') }}
          </a>
          @endif
        </p>

      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>

  <script type="text/javascript">
  let clickcontrasna=document.querySelector("#ocpassword")
  clickcontrasna.addEventListener("click",function(){
  let tipo = document.querySelector('.password')
  let icono = document.querySelector('.icono')
  if (tipo.type=='password') {
      $('.icono').removeClass('fas fa-eye').addClass('fas fa-eye-slash')
      tipo.type='text'
  }
  else {
      $('.icono').removeClass('fas fa-eye-slash').addClass('fas fa-eye')
      tipo.type='password'
    }
})
  </script>
</body>

</html>