@extends('theme.lte.inicio')


@section('headparticular')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('theme/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">


@endsection


@section('titulo')
      Clientes
@endsection

@section('contenido')

<section class="content-header">
      <h1>
            Provincia de Formosa
            <small>Sucesos</small>
      </h1>

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
                <a
                  href="{{route('clientes.create')}}"
                  id="CrearSucesoBtn"
                  class="btn btn-success btn-flat">
                  <i class="glyphicon glyphicon-plus">
                  </i> Nuevo Cliente
                </a>
                @include('partials.messages')
              </div>
              <p></p>
              <table class="table responsive table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Código</th>
                    <th>Apellido</th>
                    <th>Nombre</th>
                    <th>Tipo_Doc</th>
                    <th>Nro_Doc</th>
                    <th>Nacionalidad</th>
                    <th>Condición IVA</th>
                    
                    <th>Acciones</th>
                  </tr>
                </thead>
                  <tbody>
                   @foreach($clientes as $clie)
                   <tr>
                    <td>{{$clie->id}}</td>
                    <td>{{$clie->apellido}}</td>
                    <td>{{$clie->nombre}}</td>
                    <td>{{$clie->doc_tipo}}</td>
                    <td>{{$clie->doc_nro}}</td>
                    <td>{{$clie->nacionalidad}}</td>
                    <td>{{$clie->condicion_iva}}</td>
                    
                    <td style="width: 14%">
                      <a
                        href="{{route('clientes.show', $clie->id)}}"
                        class="btn btn-info btn-circle"
                        type="button">
                        <i class="fa fa-eye"></i>
                      </a>
                      <a
                        href="{{route('clientes.edit', $clie->id)}}"
                        class="btn btn-warning btn-flat"
                        type="button">
                        <i class="glyphicon glyphicon-edit"></i>
                      </a>

                      @if(Auth::user()->hasRole('admin'))
                        <a href="#"
                            class="btn btn-danger btn-circle"
                            data-toggle="modal"
                            data-id="{{$clie->id}}"
                            data-titulo="Eliminar Cliente"
                            data-target="#deleteCliente">
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

  <!-- Eliminar CLIENTE Modal-->
  <div class="modal modal-danger fade" id="deleteCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Eliminar Cliente</h4>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="{{route('clientes.destroy','delete')}}" method="post">
          {{method_field('delete')}}
          @csrf
          <div class="modal-body">
            <input type="hidden" name="id" id="id">
            <p class="text-center">¿Estas seguro de realizar esta acción?</p>
            <div class="modal-footer">
              @include('includes.boton-modal-eliminar')
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Editar Suceso Modal-->
  



@endsection

@section('scriptsparticular')

  <!-- DataTables -->
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
  <script src="{{asset('propios/js/clientes.js')}}"></script>

@endsection

