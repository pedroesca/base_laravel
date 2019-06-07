  @extends('theme.lte.inicio')


@section('headparticular')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('theme/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">


@endsection


@section('titulo')
Sucesos | Sigic
@endsection

@section('contenido')

<section class="content-header">
      <h1>
        Provincia de Formosa
        <small>Sucesos</small>
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
                <a
                  href="{{route('sucesos.create')}}"
                  id="CrearSucesoBtn"
                  class="btn btn-success btn-flat">
                  <i class="glyphicon glyphicon-plus">
                  </i> Nuevo Suceso
                </a>
                @include('partials.messages')
              </div>
              <p></p>
              <table class="table responsive table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Fecha / Hora informe</th>
                    <th>Factor</th>
                    <th>Lugar</th>
                    <th>Localidad</th>
                    <th>Modalidad</th>
                    <th>Pedido</th>
                    <th>Cantidad Personas</th>
                    <th>Comunidad</th>
                    <th>Situacion</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                  <tbody>
                   @foreach($sucesos as $sus)
                   <tr>
                    <td>{{$sus->id}}</td>
                    <td>{{$sus->fecha_informe}} - {{$sus->hora_informe}}</td>
                    <td>{{$sus->factores[0]->factor}}</td>
                    <td>{{$sus->lugar}}</td>
                    <td>{{$sus->localidades[0]->nombre}}</td>
                    <td>{{$sus->modalidad}}</td>
                    <td>{{$sus->pedido}}</td>
                    <td>{{$sus->cant_personas}}</td>
                    <td>{{$sus->comunidad}}</td>
                    <td>{{$sus->situacion}}</td>
                    <td style="width: 14%">
                      <a
                        href="{{route('sucesos.show', $sus->id)}}"
                        class="btn btn-info btn-circle"
                        type="button">
                        <i class="fa fa-eye"></i>
                      </a>
                      <a
                        href="{{route('sucesos.edit', $sus->id)}}"
                        class="btn btn-warning btn-flat"
                        type="button">
                        <i class="glyphicon glyphicon-edit"></i>
                      </a>

                      @if(Auth::user()->hasRole('admin'))
                        <a href="#"
                            class="btn btn-danger btn-circle"
                            data-toggle="modal"
                            data-id="{{$sus->id}}"
                            data-titulo="Eliminar Suceso"
                            data-target="#deleteSuceso">
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

  <!-- Eliminar Suceso Modal-->
  <div class="modal modal-danger fade" id="deleteSuceso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Eliminar Suceso</h4>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="{{route('sucesos.destroy','delete')}}" method="post">
          {{method_field('delete')}}
          @csrf
          <div class="modal-body">
            <input type="hidden" name="idsus" id="id">
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
  <div class="modal fade" id="editSuceso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Editar Suceso</h4>

        </div>
        <form action="{{route('sucesos.update','edit')}}" method="post">
          {{method_field('patch')}}
          @csrf

              <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                    <li class="active" ><a href="#efechas" data-toggle="tab">Inicio</a></li>
                    <li><a href="#edetails" data-toggle="tab">Detalle</a></li>
                    <li><a href="#emas_datos" data-toggle="tab">Informe</a></li>
                  </ul>

                  <div class="tab-content col">
                      <input type="hidden" name="idsus" id="id">
                      <div id="efechas" class="tab-pane fade in active">
                        <!--  tab    F E C H A S ------------------------------------------------------------------------------------------------>
                        <div class="form-group">
                            <div class="col-md-4">
                              <p class="input-group">
                              <label>Fecha de Inicio</label>
                                    <input type="date" id="efecha_inicio" name="fecha_inicio" class="form-control"/>
                                </p>
                            </div>
                            <div class="col-md-4">
                              <p class="input-group">
                              <label>Hora de Inicio</label>
                                    <input type="time" id="ehora_inicio" name="hora_inicio" class="form-control"/>
                                </p>
                            </div>
                        </div>
                        <!-- /form-group------------------------------------------------------------------------------------------------>
                        <div class="form-group">
                            <div class="col-md-4">
                              <p class="input-group">
                              <label>Fecha de Finalización</label>
                                    <input type="date" id="efecha_fin" name="fecha_fin" class="form-control"/>
                                </p>
                            </div>
                            <div class="col-md-4">
                              <p class="input-group">
                              <label>Hora de Finalización</label>
                                    <input type="time" id="ehora_fin" name="hora_fin" class="form-control"/>
                                </p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                              <p class="input-group">
                              <label>Fecha de Informe</label>
                                    <input type="date" id="efecha_informe" name="fecha_informe" class="form-control" required="true"/>
                                </p>
                            </div>
                            <div class="col-md-4">
                              <p class="input-group">
                              <label>Hora de Informe</label>
                                    <input type="time" id="ehora_informe" name="hora_informe" class="form-control"/>
                                </p>
                            </div>
                        </div>

                        <div class="form-group row">
                              <label for="factor" class="col-md-1 control-label">Factor</label>
                              <div class="col-lg-10">
                                <select class="form-control" id="efactor" name="factor">
                                <option value="">-- Selecciona --</option>
                                <option value="POLÍTICO">POLÍTICO</option>
                                <option value="SOCIAL">SOCIAL</option>
                                <option value="ECONÓMICO">ECONÓMICO</option>
                                <option value="EDUCATIVO">EDUCATIVO</option>
                                <option value="SALUD">SALUD</option>
                                </select>
                              </div>
                        </div>
                      </div>

                      <!-- tab    D E T A I L S------------------------------------------------------------------------------------------>

                      <div id="edetails" class="tab-pane fade fade">
                             <!-- /form-group------------------------------------------------------------------------------------------------>
                          <div class="form-group row">
                            <p></p>
                            <label for="lugar" class="col-sm-2 control-label">Lugar:</label>
                            <div class="col-sm-10" >
                              <input type="text" class="form-control" id="elugar" placeholder="Ingrese la descripción o lugar" name="lugar">
                            </div>
                          </div>

                          <div class="form-group row">
                                  <label for="rela_localidad" class="col-sm-2 control-label">Localidad: </label>
                                  <div class="col-sm-10">
                                    <select class="form-control" id="erela_localidad" name="rela_localidad">
                                      <option value="0">-- Selecciona --</option>
                                      @foreach($localidades as $loc)
                                        <option value="{{$loc->id}}">{{$loc->nombre}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                          </div>
                          <!-- /form-group------------------------------------------------------------------------------------------------>

                          <div class="form-group row">
                            <label for="coordenadas" class="col-sm-2 control-label pull-left">Coordenadas:</label>
                            <div class="col-sm-4 pull-left">
                              <input type="text" class="form-control" id="ecoordenadas" placeholder="" name="coordenadas" autocomplete="on">
                            </div>
                            {{-- <a target="_blank" id="maps" rel="noopener noreferrer" href="https://maps.google.com/?q={{$sus->coordenadas}}&z=15&t=k"  class="glyphicon glyphicon-map-marker"></a> --}}
                          </div>

                          <div class="form-group row">
                            <label for="modalidad" class="col-sm-2 control-label">Modalidad:</label>
                            <div class="col-sm-4">
                              <select class="form-control" id="emodalidad" name="modalidad">
                                  <option value="">-- Selecciona --</option>
                                  <option value="ACAMPE">ACAMPE</option>
                                  <option value="MANIFESTACIÓN">MANIFESTACIÓN</option>
                                  <option value="NOVEDAD">NOVEDAD</option>
                                  <option value="RECLAMO">RECLAMO</option>
                                  <option value="MARCHA">MARCHA</option>
                              </select>
                            </div>
                          </div>


                          <!-- /form-group------------------------------------------------------------------------------------------------>
                          <div class="form-group row">
                            <label for="referente" class="col-sm-2 control-label">Referente:</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="ereferente" placeholder="" name="referente" autocomplete="on">
                            </div>
                          </div>

                          <!-- /form-group------------------------------------------------------------------------------------------------>
                          <div class="form-group row">
                            <label for="pedido" class="col-sm-2 control-label">Pedido:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="epedido" placeholder="" name="pedido" autocomplete="on">
                            </div>
                          </div>
                          <!-- /form-group------------------------------------------------------------------------------------------------>
                          <div class="form-group row">
                            <label for="comunidad" class="col-sm-2 control-label">Comunidad:</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="ecomunidad" name="comunidad">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="cant_personas" class="col-sm-4">Cantidad de Personas:</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="ecant_personas" placeholder="0" name="cant_personas" autocomplete="on">
                            </div>
                          </div>

                          <div class="form-group row">
                                <label for="cant_personas" class="col-sm-2">Situación:</label>
                                <div class="col-sm-10">
                                  <select class="form-control" id="esituacion" name="situacion">
                                  <option value="">-- Selecciona --</option>
                                  <option value="VIGENTE">VIGENTE</option>
                                  <option value="NO VIGENTE">NO VIGENTE</option>
                                  <option value="RESUELTO">RESUELTO</option>
                                  <option value="Otro">Otro</option>
                                </select>
                                </div>
                          </div>
                      </div>



                      <!-- / TAB    MAS DATOS------------------------------------------------------------------------------------------------>
                      <div id="emas_datos" class="tab-pane fade">
                        <!-- /form-group------------------------------------------------------------------------------------------------>
                            <div class="form-group row">
                              <label for="general" class="col-lg-3">Informe</label>
                              <div class="col-lg-12">
                                  <textarea class="form-control" id="egeneral" rows="8" placeholder="Ingrese el informe y/o descripción detallada del hecho" name="general" autocomplete="off"></textarea>
                              </div>
                            </div>
                      </div>
                    <!-- /form-group------------------------------------------------------------------------------------------------>
                  </div>
              </div>

          <div class="modal-footer">
            <div>
               @include('includes.boton-modal-editar')
            </div>
          </div>
        </form>


      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>



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
  <script src="{{asset('propios/js/sucesos.js')}}"></script>

@endsection

