@extends('theme.lte.inicio')


@section('headparticular')
<!-- Select2 -->
  <link rel="stylesheet" href="{{asset('theme/lte/bower_components/select2/dist/css/select2.min.css')}}">
@endsection


@section('titulo')
Crear Suceso | Sigic
@endsection

@section('contenido')

	<section class="content-header">
		<h1>
	       Sucesos
	        <small>Crear Nuevo Suceso</small>
	    </h1>

	</section>
	    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        	<form action="{{route('sucesos.update','edit')}}" method="post">
          {{method_field('patch')}}
          @csrf
            <input type="hidden" value="{{$sucesos->id}}" name="id"/>
              <div class="nav-tabs-custom">
                      <ul class="nav nav-tabs">
                        <li class="active" ><a href="#fechas" data-toggle="tab">Inicio</a></li>
                        <li><a href="#details" data-toggle="tab">Detalle</a></li>
                        <li><a href="#mas_datos" data-toggle="tab">Otros Datos</a></li>
                        <li><a href="#informe" data-toggle="tab">Informe</a></li>
                      </ul>
                      <div class="tab-content col">

                          <div id="fechas" class="tab-pane fade in active">
                            <!--  tab    F E C H A S ------------------------------------------------------------------------------------------------>
                            <div class="form-group row">
                                <div class="col-md-4">
                                  <p class="input-group">
                                  <label class="requerido">Fecha de Inicio</label>
                                        <input type="date" value="{{old('fecha_inicio',$sucesos->fecha_inicio)}}" id="fecha_inicio" name="fecha_inicio" class="form-control"/>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                  <p class="input-group">
                                  <label class="requerido">Hora de Inicio</label>
                                        <input type="time" value="{{old('hora_inicio',$sucesos->hora_inicio)}}" id="hora_inicio" name="hora_inicio" class="form-control"/>
                                    </p>
                                </div>
                            </div>
                            <!-- /form-group------------------------------------------------------------------------------------------------>
                            <div class="form-group row">
                                <div class="col-md-4">
                                  <p class="input-group">
                                  <label>Fecha de Finalización</label>
                                        <input type="date" value="{{old('fecha_fin',$sucesos->fecha_fin)}}" id="fecha_fin" name="fecha_fin" class="form-control"/>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                  <p class="input-group">
                                  <label>Hora de Finalización</label>
                                        <input type="time" value="{{old('hora_fin',$sucesos->hora_fin)}}" id="hora_fin" name="hora_fin" class="form-control"/>
                                    </p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                  <p class="input-group">
                                  <label class="requerido">Fecha de Informe</label>
                                        <input type="date" value="{{old('fecha_informe',$sucesos->fecha_informe)}}" id="fecha_informe" name="fecha_informe" class="form-control"{{--  required="true" --}}/>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                  <p class="input-group">
                                  <label class="requerido">Hora de Informe</label>
                                        <input type="time" value="{{old('hora_informe',$sucesos->hora_informe)}}" id="hora_informe" name="hora_informe" class="form-control"/>
                                    </p>
                                </div>
                            </div>

                            <div class="form-group row">
                                  <label for="factor" class="col-lg-2 control-label requerido">Factor Primario:</label>
                                  <div class="col-lg-10">
                                    <select class="form-control select2" id="factor" name="factor" style="width: 50%;">
                                    @foreach($factores as $fac)
                                      <option value="{{$fac->id}}" {{($fac->id == $sucesos->factores[0]->id) ? 'selected' : ''}}>{{$fac->factor}}</option>
                                    @endforeach
                                    </select>
                                  </div>
                            </div>

                            <div class="form-group row">
                                <label for="factor_secundario" class="col-sm-2 control-label">Factores Secundarios:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{old('nombre',$sucesos->nombre)}}" id="factor_secundario" placeholder="" name="factor_secundario" autocomplete="on">
                                </div>
                              </div>
                          </div>

                          <!-- tab    D E T A I L S------------------------------------------------------------------------------------------>

                          <div id="details" class="tab-pane fade fade">
                                 <!-- /form-group------------------------------------------------------------------------------------------------>
                              <div class="form-group row">
                                <label for="lugar" class="col-lg-2 control-label requerido">Lugar:</label>
                                <div class="col-lg-10" >
                                  <input type="text" class="form-control" value="{{old('nombre',$sucesos->nombre)}}" id="lugar" placeholder="Ingrese la descripción o lugar" name="lugar">
                                </div>
                              </div>

                              <div class="form-group row">
                                      <label for="rela_localidad" class="col-lg-2 control-label requerido">Localidad: </label>
                                      <div class="col-lg-4">
                                        <select class="form-control select2" id="rela_localidad" name="rela_localidad" style="width: 100%;" >
                                          <option value="{{old('nombre',$sucesos->nombre)}}">-- Selecciona --</option>
                                          @foreach($localidades as $loc)
                                            <option value="{{$loc->id}}">{{$loc->departamento}} - {{$loc->nombre}}</option>
                                          @endforeach
                                        </select>
                                      </div>

                                <label for="coordenadas" class="col-lg-2 control-label pull-left requerido">Coordenadas:</label>
                                <div class="col-lg-4 pull-left">
                                  <input type="text" class="form-control" id="coordenadas" placeholder="" name="coordenadas" autocomplete="on">
                                </div>
                                {{-- <a target="_blank" rel="noopener noreferrer" href="https://maps.google.com/"  class="glyphicon glyphicon-map-marker"></a> --}}
                              </div>

                              <div class="form-group row">
                                <label for="modalidad" class="col-lg-2 control-label requerido">Modalidad:</label>
                                <div class="col-lg-4">
                                  <select class="form-control select2" id="modalidad" name="modalidad" style="width: 100%;">
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
                          {{--     <div class="form-group row">
                                <label for="referente" class="col-sm-2 control-label">Referente:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="referente" placeholder="" name="referente" autocomplete="on">
                                </div>
                              </div> --}}

                              <!-- /form-group------------------------------------------------------------------------------------------------>
                              <div class="form-group row">
                                <label for="pedido" class="col-sm-2 control-label">Pedido:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="pedido" placeholder="" name="pedido" autocomplete="on">
                                </div>
                              </div>
                              <!-- /form-group------------------------------------------------------------------------------------------------>
                              <div class="form-group row">
                                <label for="comunidad" class="col-sm-2 control-label">Comunidad:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="comunidad" name="comunidad">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="cant_personas" class="col-lg-2 requerido">Cantidad Personas:</label>
                                <div class="col-lg-2">
                                    <input type="text" class="form-control" id="cant_personas" placeholder="0" name="cant_personas" autocomplete="on">
                                </div>
                              </div>

                              <div class="form-group row">
                                    <label for="cant_personas" class="col-lg-2 requerido">Situación:</label>
                                    <div class="col-lg-10">
                                      <select class="form-control select2" id="situacion" name="situacion" style="width: 100%;">
                                      <option value="">-- Selecciona --</option>
                                      <option value="VIGENTE">VIGENTE</option>
                                      <option value="NO VIGENTE">NO VIGENTE</option>
                                      <option value="RESUELTO">RESUELTO</option>
                                      <option value="Otro">Otro</option>
                                    </select>
                                    </div>
                              </div>
                          </div>
                          <!-- / TAB Informe------------------------------------------------------------------------------------------------>
                          <div id="informe" class="tab-pane fade">
                            <!-- /form-group------------------------------------------------------------------>
                                <div class="form-group row">
                                  <label for="general" class="col-lg-3">Informe</label>
                                  <div class="col-lg-12">
                                      <textarea class="form-control" id="general" rows="8" placeholder="Ingrese el informe y/o descripción detallada del hecho" name="general" autocomplete="off"></textarea>
                                  </div>
                                </div>
                          </div>

                          <div id="mas_datos" class="tab-pane fade">
                            <div class="row">
                              <label for="motivo_primario" class="col-sm-3 control-label">Motivaciones Primarias:</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="motivo_primario" name="motivo_primario">
                                  </div>
                               </div>
                               <div class="form-group row">
                                  <label for="motivo_secundario" class="col-sm-3 control-label">Motivaciones Secundarias:</label>
                                  <div class="col-sm-12">
                                    <input type="text" class="form-control" id="motivo_secundario" name="motivo_secundario">
                                  </div>
                               </div>
                               <div class="form-group row">
                                  <label for="antecedentes" class="col-lg-3">Antecedentes</label>
                                  <div class="col-lg-12">
                                      <textarea class="form-control" id="antecedentes" rows="8" placeholder="Antecedentes del suceso en cuestión" name="antecedentes" autocomplete="off"></textarea>
                                  </div>
                                </div>
                           </div>
                        <!-- /formaa-group------------------------------------------------------------------------------------------------>
                      </div>
                    </div>



                    <div class="form-group row">
                      <div class="col-lg-12">
                        <button class="btn btn-warning pull-left" type="button" data-dismiss="modal">Cancelar</button>
              {{-- <button class="btn btn-danger pull-left" type="reset">Resetear TODOS los campos</button> --}}
                        <button class="btn btn-success pull-right" type="submit" id="submit" autocomplete="off">Guardar Cambios</button>

                      </div>
                    </div>



        </form>
      <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  <!-- /.content -->
@endsection