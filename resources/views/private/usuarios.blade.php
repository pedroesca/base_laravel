@extends('theme.lte.inicio')


@section('headparticular')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('theme/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">


@endsection


@section('titulo')
Usuarios | Sigic
@endsection

@section('contenido')


<section class="content-header">
      <h1>
        Control de Usuarios
        <small>Admin</small>
      </h1>
      {{-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol> --}}
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div >
                @if(Auth::user()->hasRole('admin'))
                   <a
                   href="#" class="btn btn-success btn-icon-split"
                   data-toggle="modal"
                   data-target="#CrearUsuario">
                   <span class="icon text-white-50">
                    <i class="glyphicon glyphicon-plus"></i>
                  </span>
                  <span class="text ">Agregar Usuario</span>
                </a>
                @endif
              </div>
              <p></p>

              <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Rol</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach($usuarios as $user)
                 <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->username}}</td>
                  <td>{{$user->roles[0]->descripcion}}</td>
                  <td>{{$user->email}}</td>
                  <td>
                    @if(Auth::user()->hasRole('admin'))
                    <a href="#"
                    class="btn btn-info btn-circle"
                    data-titulo="Editar Usuario"
                    data-id="{{$user->id}}"
                    data-name="{{$user->name}}"
                    data-username="{{$user->username}}"
                    data-rol="{{$user->roles[0]->id}}"
                    data-email="{{$user->email}}"
                    data-toggle="modal"
                    data-target="#EditUsuario">
                    <i class="glyphicon glyphicon-edit"></i>
                    </a>

                    <a href="#"
                    class="btn btn-danger btn-circle"
                    data-toggle="modal"
                    data-id="{{$user->id}}"
                    data-rol="{{$user->roles[0]->id}}"
                    data-titulo="Eliminar Usuario"
                    data-target="#deleteUsuario">
                    <i class="glyphicon glyphicon-trash"></i>
                  </a>
                  @else
                  <div></div>
                @endif

                </td>
                </tr>
                @endforeach

                </tbody>
              </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->


<!-- Nuevo Usuario Modal-->
<div class="modal  fade" id="CrearUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Crear Usuario</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="{{route('register')}}" method="post">
        @csrf
        <div class="modal-body">

          <div class="form-group row">
            <label
            for="name" class="col-md-5 col-form-label text-md-left">Nombre:</label>
            <input class="col-lg-6 text-md-left"
                id="name"
                type="text"
                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                name="name"
                value="{{ old('name') }}"
                required autocomplete="name" autofocus>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
          </div>

          <div class="form-group row">
            <label
            for="username" class="col-md-5 col-form-label text-md-left">Usuario:</label>
            <input class="col-lg-6 text-md-left"
                id="username"
                type="text"
                class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                name="username"
                value="{{ old('username') }}"
                required autocomplete="username" autofocus>

            @if ($errors->has('username'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
          </div>

          <div class="form-group row">
            <label
            for="email" class="col-md-5 col-form-label text-md-left">Correo:</label>
            <input class="col-lg-6 text-md-left"
              id="email"
              type="email"
              class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
              name="email"
              value="{{ old('email') }}"
              placeholder="ejemplo@mail.com"
              required autocomplete="email">

              @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
          </div>

          <div class="form-group row">
            <label
            for="password" class="col-md-5 col-form-label text-md-left">Contraseña:</label>
            <input class="col-lg-6 text-md-left"
              id="password"
              type="password"
              class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
              name="password"
              placeholder="Al menos 6 caracteres"
              required autocomplete="new-password">

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>

          <div class="form-group row">
            <label
              for="password-confirm"
              class="col-md-5 col-form-label text-md-left">Confirmar Contraseña:</label>
            <input class="col-lg-6 text-md-left"
              id="password-confirm"
              type="password" class="form-control"
              name="password_confirmation"
              placeholder="Repetir la contraseña"
              required autocomplete="new-password">
          </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary" type="submit" >Guardar</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- Editar Usuario Modal-->
<div class="modal fade" id="EditUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="{{route('micuenta.update','edit')}}" method="post">
        {{method_field('patch')}}
        @csrf
        <div class="modal-body">
          <input type="hidden" name="iduser" id="id">


          <div class="form-group row">
            <label
            for="name" class="col-md-4 col-form-label text-md-left">Nombre:</label>
            <input class="col-lg-6 text-md-left"
            type="text"
            name="name"
            id="name"
            class="from-control">
          </div>

          <div class="form-group row">
            <label
            for="username" class="col-md-4 col-form-label text-md-left">Usuario:</label>
            <input class="col-lg-6 text-md-left"
            type="text"
            name="username"
            id="username"
            class="from-control">
          </div>


          <div class="form-group row">
            <label
            for="idrol" class="col-md-4 col-form-label text-md-left">Rol:</label>
            <div class="col-lg-6 d-none d-lg-block">
              <select class="form-control" id="roles" name="idrol">
                @foreach($roles as $rol)
                <option value="{{$rol->id}}">{{$rol->descripcion}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <input type="hidden" name="idrolold" id="idrolante">

          <div class="form-group row">
            <label
            for="email" class="col-md-4 col-form-label text-md-left">Correo:</label>
            <input class="col-lg-6 text-md-left"
            type="text"
            name="email"
            id="email"
            class="from-control">
          </div>


          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary" type="submit" >Guardar Cambios</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Eliminar Usuario Modal-->
<div class="modal fade" id="deleteUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Usuario Localidad</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="{{route('micuenta.destroy','delete')}}" method="post">
        {{method_field('delete')}}
        @csrf
        <div class="modal-body">
          <input type="hidden" name="iduser" id="id">
          <input type="hidden" name="idrol" id="rol">
          <p class="text-center">¿Estas seguro de realizar esta acción?</p>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-danger" type="submit" >Sí, eliminar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>



@endsection

@section('scriptsparticular')
<!-- DataTables -->
<script src="{{asset('theme/lte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('theme/lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- Page level custom scripts -->

<!-- page script -->
<script >
  $(document).ready(function() {
  $('#dataTable').DataTable(
  {
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
    }
  }
  );
});
</script>



<script>
  $('#EditUsuario').on('show.bs.modal', function (event){
      //console.log('MODAL CELocalidad');
      var button = $(event.relatedTarget)
      var titulo = button.data('titulo')
      var id = button.data('id')
      var name = button.data('name')
      var username = button.data('username')
      var rol = button.data('rol')
      var rolold = button.data('rol')
      var email = button.data('email')

      var modal = $(this)
      modal.find('.modal-title').text(titulo);
      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #name').val(name);
      modal.find('.modal-body #username').val(username);
      modal.find('.modal-body #roles').val(rol);
      modal.find('.modal-body #idrolante').val(rol);
      modal.find('.modal-body #email').val(email);

    })

  $('#deleteUsuario').on('show.bs.modal', function (event){
      //console.log('MODAL CELocalidad');
      var button = $(event.relatedTarget)
      var id = button.data('id')
      var rol = button.data('rol')

      var modal = $(this)
      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #rol').val(rol);


    })
  </script>

@endsection

