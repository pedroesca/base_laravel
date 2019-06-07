@extends('theme.lte.inicio')


@section('headparticular')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('theme/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

@endsection


@section('titulo')
Localidades | Sigic
@endsection

@section('contenido')

<section class="content-header">
      <h1>
        Provincia de Formosa
        <small>Localidades</small>
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
                  id="CrearLocalidadBtn"
                  data-toggle="modal"
                  data-target="#CrearLocalidad"
                  class="btn btn-success btn-flat">
                  <i class="glyphicon glyphicon-plus">
                  </i> Agregar Localidad
                </button>
                @include('partials.messages')
              </div>
              <p></p>
              <table class="table table-bordered table-striped" id="dataTable">
                <thead>
                  <tr>
                    <th style="width: 10%">ID</th>
                    <th style="width: 10%">Departamento</th>
                    <th>Nombre</th>
                    <th>Ubicación</th>
                    <th>Referencia</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                  <tbody>
                   @foreach($localidades as $loc)
                   <tr>
                    <td>{{$loc->id}}</td>
                    <td>{{$loc->departamento}}</td>
                    <td>{{$loc->nombre}}</td>
                    <td>
                        <a
                          target="_blank"
                          id="maps"
                          rel="noopener noreferrer"
                          href="https://maps.google.com/?ll={{$loc->coordenadas}}&z=13&t=k"
                          class="fa fa-map-o">  Ir
                        </a>
                    </td>
                    <td>{{$loc->referencia}}</td>
                    <td>
                      @if(Auth::user()->hasRole('admin'))
                        <a href="#"
                          class="btn btn-info btn-circle"
                          data-titulo="Editar Localidad"
                          data-id="{{$loc->id}}"
                          data-departamento="{{$loc->departamento}}"
                          data-nombre="{{$loc->nombre}}"
                          data-coordenadas="{{$loc->coordenadas}}"
                          data-referencia="{{$loc->referencia}}"
                          data-toggle="modal"
                          data-target="#EditLocalidad">
                        <i class="glyphicon glyphicon-edit"></i>
                        </a>

                      <a href="#"
                          class="btn btn-danger btn-circle"
                          data-toggle="modal"
                          data-id="{{$loc->id}}"
                          data-titulo="Elimiar Localidad"
                          data-target="#deleteLocalidad">
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

<!-- Eliminar Localidad Modal-->
<div class="modal modal-danger fade" id="deleteLocalidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Eliminar Localidad</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="{{route('localidades.destroy','delete')}}" method="post">
        {{method_field('delete')}}
        @csrf
        <div class="modal-body">
          <input type="hidden" name="idloc" id="id">
          <p class="text-center">¿Estas seguro de realizar esta acción?</p>
          <div class="modal-footer">
            @include('includes.boton-modal-eliminar')
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Nueva Localidad Modal-->
<div class="modal fade" id="CrearLocalidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ingresar Localidad</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>

      </div>
      <form action="{{route('localidades.store')}}" method="post" id="formNuevaLocalidad">
        @csrf
        <div class="modal-body">

          <div class="form-group row">
            <label
              for="departamento"
              class="col-sm-3 control-label requerido">
                Departamento:
            </label>
            <div class="col-sm-7" >
              <select id="departamento" name="departamento" class="form-control">
                <option >Seleccione</option>
                <option value="BERMEJO">BERMEJO</option>
                <option value="FORMOSA">FORMOSA</option>
                <option value="LAISHÍ">LAISHÍ</option>
                <option value="MATACOS">MATACOS</option>
                <option value="PATIÑO">PATIÑO</option>
                <option value="PILAGÁS">PILAGÁS</option>
                <option value="PILCOMAYO">PILCOMAYO</option>
                <option value="PIRANÉ">PIRANÉ</option>
                <option value="RAMÓN LISTA">RAMÓN LISTA</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label
              for="nombre"
              class="col-sm-3 control-label requerido">
                Nombre:
            </label>
            <input class="col-sm-7"
            type="text"
            name="nombre"
            id="nombre"
            class="from-control"
            autocomplete="off">
          </div>

          <div class="form-group row">
            <label
              for="coordenadas"
              class="col-sm-3 control-label requerido">
                Coordenadas:
            </label>
            <input class="col-sm-7"
            type="text"
            name="coordenadas"
            id="coordenadas"
            class="from-control"
            autocomplete="off">
          </div>

          <div class="form-group row">
            <label
              for="referencia"
              class="col-sm-3 control-label">
                Referencia:
            </label>
            <input class="col-sm-7"
            type="text"
            name="referencia"
            id="referencia"
            class="from-control"
            autocomplete="off">
          </div>

          <div class="modal-footer">
            @include('includes.boton-modal-crear')
          </div>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- Editar Localidad Modal-->
<div class="modal fade" id="EditLocalidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="{{route('localidades.update','edit')}}" method="post">
        {{method_field('patch')}}
        @csrf
        <div class="modal-body">
          <input type="hidden" name="idloc" id="id">
          <div class="form-group row">
            <label
              for="departamento"
              class="col-sm-3 control-label requerido">
                Departamento:
            </label>
            <div class="col-sm-7" >
              <select class="form-control" id="departamento" name="departamento">
                <option >Seleccione</option>
                <option value="BERMEJO">BERMEJO</option>
                <option value="FORMOSA">FORMOSA</option>
                <option value="LAISHÍ">LAISHÍ</option>
                <option value="MATACOS">MATACOS</option>
                <option value="PATIÑO">PATIÑO</option>
                <option value="PILAGÁS">PILAGÁS</option>
                <option value="PILCOMAYO">PILCOMAYO</option>
                <option value="PIRANÉ">PIRANÉ</option>
                <option value="RAMÓN LISTA">RAMÓN LISTA</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label
              for="nombre"
              class="col-sm-3 control-label requerido">
                Nombre:
            </label>
            <input class="col-sm-7"
            type="text"
            name="nombre"
            id="nombre"
            class="from-control"
            autocomplete="off">
          </div>

          <div class="form-group row">
            <label
              for="coordenadas"
              class="col-sm-3 control-label requerido">
                Coordenadas:
            </label>
            <input class="col-sm-7"
            type="text"
            name="coordenadas"
            id="coordenadas"
            class="from-control"
            autocomplete="off">
          </div>

          <div class="form-group row">
            <label
              for="referencia"
              class="col-sm-3 control-label">
                Referencia:
            </label>
            <input class="col-sm-7"
            type="text"
            name="referencia"
            id="referencia"
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


<script src="{{asset('propios/js/localidades.js')}}"></script>
@endsection

