@extends('theme.lte.inicio')


@section('headparticular')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('theme/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">


@endsection


@section('titulo')
Factores | Sigic
@endsection

@section('contenido')

<section class="content-header">
      <h1>
        Factores
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
              <div>
                <button
                  id="CrearFactorBtn"
                  data-toggle="modal"
                  data-target="#CrearFactor"
                  class="btn btn-success btn-flat">
                  <i class="glyphicon glyphicon-plus">
                  </i> Agregar Factor
                </button>
                @include('partials.messages')
              </div>
              <p></p>
              <table class="table table-bordered table-striped" id="dataTable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Factor</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                  <tbody>
                   @foreach($factores as $factor)
                   <tr>
                    <td style="width: 10%">{{$factor->id}}</td>
                    <td style="width: 20%">{{$factor->factor}}</td>
                    <td style="width: 60%">{{$factor->descripcion}}</td>
                    <td style="width: 10%">
                      @if(Auth::user()->hasRole('admin'))
                        <a href="#"
                          class="btn btn-info btn-circle"
                          data-titulo="Editar Factor"
                          data-id="{{$factor->id}}"
                          data-factor="{{$factor->factor}}"
                          data-descripcion="{{$factor->descripcion}}"
                          data-toggle="modal"
                          data-target="#EditFactor">
                        <i class="glyphicon glyphicon-edit"></i>
                        </a>

                      <a href="#"
                          class="btn btn-danger btn-circle"
                          data-toggle="modal"
                          data-id="{{$factor->id}}"
                          data-titulo="Eliminar Factor"
                          data-target="#deleteFactor">
                        <i class="glyphicon glyphicon-trash"></i>
                      </a>
                  @else
                  </td>
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

<!-- Eliminar Factor Modal-->
<div class="modal modal-danger fade" id="deleteFactor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Eliminar Factor</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="{{route('factores.destroy','delete')}}" method="post">
        {{method_field('delete')}}
        @csrf
        <div class="modal-body">
          <input type="hidden" name="idfac" id="id">
          <p class="text-center">¿Estas seguro de realizar esta acción?</p>
          <div class="modal-footer">
            @include('includes.boton-modal-eliminar')
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Nueva Factor Modal-->
<div class="modal fade" id="CrearFactor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ingresar Factor</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>

      </div>
      <form action="{{route('factores.store')}}" method="post" id="formNuevoFactor">
        @csrf
        <div class="modal-body">
          <div class="form-group row">
            <label
              for="factor"
              class="col-sm-3 control-label requerido">
                Nombre del Factor:
            </label>
            <input class="col-sm-7"
            type="text"
            name="factor"
            id="factor"
            class="from-control"
            autocomplete="off">
          </div>
          <div class="form-group row">
            <label
              for="descripcion"
              class="col-sm-3 control-label">
                Descripción:
            </label>
            <input class="col-sm-7"
            type="text"
            name="descripcion"
            id="descripcion"
            class="from-control"
            autocomplete="off">
          </div>

          <div class="modal-footer">
              <button class="btn btn-warning pull-left" type="button" data-dismiss="modal">Cancelar</button>
              {{-- <button class="btn btn-danger pull-left" type="reset">Resetear TODOS los campos</button> --}}
              <button class="btn btn-success" type="submit" id="submitNuevo" data-loading-text="Loading..." autocomplete="off">Guardar</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- Editar Localidad Modal-->
<div class="modal fade" id="EditFactor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="{{route('factores.update','edit')}}" method="post">
        {{method_field('patch')}}
        @csrf
        <div class="modal-body">
          <input type="hidden" name="idfac" id="id">

          <div class="form-group row">
            <label
              for="factor"
              class="col-sm-3 control-label requerido">
                Nombre del Factor:
            </label>
            <input class="col-sm-7"
            type="text"
            name="factor"
            id="factor"
            class="from-control"
            autocomplete="off">
          </div>
          <div class="form-group row">
            <label
              for="descripcion"
              class="col-sm-3 control-label">
                Descripción:
            </label>
            <input class="col-sm-7"
            type="text"
            name="descripcion"
            id="descripcion"
            class="from-control"
            autocomplete="off">
          </div>

          <div class="modal-footer">
            @include('includes.boton-modal-editar')
          </div>
        </div>
      </form>
    </div>
  </div>
</div>




@endsection

@section('scriptsparticular')

<!-- DataTables -->
{{-- <script src="{{asset('propios/js/traducirDatatable.js')}}"></script> --}}
<script src="{{asset('theme/lte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('theme/lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- Page level custom scripts -->
<script>
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
<!-- page script -->


<script src="{{asset('propios/js/factores.js')}}"></script>
@endsection

