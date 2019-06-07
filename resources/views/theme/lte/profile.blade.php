@extends('theme.lte.inicio')


@section('headparticular')

@endsection


@section('titulo')
Perfil | Sigic
@endsection

@section('contenido')

	<section class="content-header">
      <h1>
        Tu Perfil
      </h1>
  </section>

  <!-- Main content -->
  <section class="content">
  <div class="row">
      <div class="col-md-10">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab">Tus datos</a></li>
            {{-- <li><a href="#tab2" data-toggle="tab">Configuración</a></li> --}}
          </ul>
          <div class="tab-content">
            <div class="active tab-pane" id="tab1">
              <div class="row">
                <label for="nombre" class="col-sm-2 control-label">Nombre:</label>
                <span>{{ Auth::user()->name }}</span>
              </div>

              <div class="row">
                <label for="nombre" class="col-sm-2 control-label">Apellido:</label>
                <span>{{ Auth::user()->surname }}</span>
              </div>

              <div class="row">
                <label for="nombre" class="col-sm-2 control-label">Usuario:</label>
                <span>{{ Auth::user()->username }}</span>
              </div>
              <div class="row">
                <label for="nombre" class="col-sm-2 control-label">Correo:</label>
                <span>{{ Auth::user()->email }}</span>
              </div>
              <div class="row">
                <label for="nombre" class="col-sm-2 control-label">Rol / Perfil:</label>
                <span>
                  @if(Auth::user()->hasRole('admin'))
                  Administrador
                  @else
                  Usuario
                  @endif
                </span>
              </div>


              <label class="col-sm-2 control-label"></label>
              <div>
                <a
                  id="cambiarpasswordbtn"
                  data-toggle="modal"
                  data-target="#cambiarpassword"
                  class="btn btn-success btn-flat">
                  <i class="glyphicon glyphicon-plus"></i> Cambiar Contraseña
                </a>
                @if(session()->has('flash'))
                <span style="color:green">{{session('flash')}}</span>
                @endif
              </div>
           </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
  </section>
  <!-- /.content -->


  <!-- Editar Usuario Modal-->
  <div class="modal fade" id="cambiarpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="{{route('micuenta.update','edit')}}" id="cambiarpasswordForm" method="post">
          {{method_field('patch')}}
          @csrf
          <div class="modal-body">
            <input type="hidden" value="{{ Auth::user()->id }}" name="idusu" id="id">

            <div class="form-group row">
              <label
              for="password_actual" class="col-md-5 col-form-label text-md-left">Contraseña Actual:</label>
              <input class="col-lg-6 text-md-left"
                id="password_actual"
                type="password"
                class="form-control"
                name="password_actual"
                placeholder="">
            </div>

            <div class="form-group row">
              <label
              for="password" class="col-md-5 col-form-label text-md-left">Contraseña:</label>
              <input class="col-lg-6 text-md-left"
                id="password"
                type="password"
                class="form-control"
                name="password"
                placeholder="Al menos 6 caracteres">
            </div>

            <div class="form-group row">
              <label
                for="password-confirm"
                class="col-md-5 col-form-label text-md-left">Confirmar Contraseña:</label>
              <input class="col-lg-6 text-md-left"
                id="password-confirm"
                type="password" class="form-control"
                name="password_confirmation"
                placeholder="Repetir la contraseña">
            </div>
          </div>
          <div class="modal-footer">
            @include('includes.boton-modal-editar')
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection


@section('scriptsparticular')
<script src="{{asset('propios/js/cambiarpass.js')}}"></script>
@endsection