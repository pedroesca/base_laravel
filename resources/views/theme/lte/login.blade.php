@extends('theme.lte.layout')

@section('titulo')
Iniciar Sesion
@endsection

@section('headparticular')
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('theme/lte/plugins/iCheck/square/blue.css')}}">
  <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a><b>Iniciar </b>Sesión</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Ingresá tus credenciales</p>

    <form method="POST" action="{{ route('login') }}">
      @csrf {{-- campo que envia token para validar la session --}}

       <!-- CAMPO USUARIO -->
      <div class="form-group has-feedback">
        <input
          id="username"
          placeholder="Ingresa tu usuario"
          class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
          name="username"
          value="{{ old('username') }}"
          required autocomplete="username"
          autofocus>
          @if ($errors->has('username'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
          @endif

        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <!-- CAMPO CONTRASEÑA -->
      <div class="form-group has-feedback">
        <input
          id="password"
          placeholder="Ingresa tu contraseña"
          type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
          name="password"
          required autocomplete="current-password">

      @if ($errors->has('password'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
      @endif
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>


      <div class="row">
        <div class="col-xs-7">
          <div class="checkbox icheck">
            <label>
              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label class="form-check-label" for="remember">
                  {{ __('Recuerdame') }}
              </label>
            </label>
          </div>
        </div>

       <!-- BOTON INICIAR SESIÓN -->
        <div class="col-xs-5">
          <button
            type="submit"
            class="btn btn-primary btn-block btn-flat">{{ __('Iniciar sesión') }}</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
{{--
    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    <!/.social-auth-links  --}}
{{--
    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a> --}}

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@include('theme.lte.scripts')
@section('scriptsparticular')
<!-- iCheck -->
<script src="{{asset('theme/lte/plugins/iCheck/icheck.min.js')}}"></script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
@endsection

@endsection