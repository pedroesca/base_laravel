@extends('theme.lte.inicio')


@section('headparticular')
	<!-- Select2 -->
  <link rel="stylesheet" href="{{asset('theme/lte/bower_components/select2/dist/css/select2.min.css')}}">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('theme/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

@endsection


@section('titulo')
Vista Suceso | Sigic
@endsection

@section('contenido')

	<section class="content-header">
		<h1>
	       Suceso.
	    </h1>

	</section>
	    <!-- Main content -->
    <section class="content">
      <div class="row">
      	<span id="form_result"></span>
        <div class="col-xs-12">
          	<div class="nav-tabs-custom">
			                <ul class="nav nav-tabs">
			                  <li class="active" ><a href="#fechas" data-toggle="tab">Inicio</a></li>
			                  <li><a href="#details" data-toggle="tab">Detalle</a></li>
			                  <li><a href="#informe" data-toggle="tab">Informe</a></li>
			                  <li><a href="#mas_datos" data-toggle="tab">Otros Datos</a></li>
			                  <li ><a href="#personas" data-toggle="tab">Personas</a></li>
			                </ul>
			                <div class="tab-content col">

			                    <div id="fechas" class="tab-pane fade in active">
			                      <!--  tab    F E C H A S ------------------------------------------------------------------------------------------------>


			                          <div class="row-md-1">
			                            <label class="col-lg-2">Fecha de Inicio: </label>
			                            <span>{{$suceso->fecha_inicio}}</span>

			                          </div>
			                          <p></p>
			                          <div class="row-md-1">
			                            <label class="col-lg-2">Hora de Inicio: </label>
			                            <span>{{$suceso->hora_inicio}}</span>

			                          </div>
			                          <p></p>
			                          <div class="row-md-1">

			                           <label class="col-lg-2">Fecha de Finalización: </label>
			                            <span>{{$suceso->fecha_fin}}</span>

				                      </div>
				                      <p></p>
			                          <div class="row-md-1">

			                           <label class="col-lg-2">Hora de Finalización: </label>
			                            <span>{{$suceso->hora_fin}}</span>

				                      </div>
				                      <p></p>

			                          <div class="row-md-1">

			                            <label class="col-lg-2">Fecha de Informe: </label>
			                            <span>{{$suceso->fecha_informe}}</span>

			                          </div>
			                          <p></p>
			                          <div class="row-md-1">

			                            <label class="col-lg-2">Hora de Informe</label>
			                            <span>{{$suceso->hora_informe}}</span>

			                          </div>
			                          <p></p>
		                            <div class="row-md-1">
		                           		<label class="col-lg-2">Factor:</label>
		                            	<span>{{$suceso->factores[0]->factor}}</span>
		                            </div>

			                    </div>

			                    <!-- tab    D E T A I L S------------------------------------------------------------------------------------------>

			                    <div id="details" class="tab-pane fade fade">
			                           <!-- /form-group------------------------------------------------------------------------------------------------>

			                        <div class="row-md-1">
			                        	<label class="col-lg-2">Lugar:</label>
			                            <span>{{$suceso->lugar}}</span>
			                        </div>
			                        <p></p>
			                        <div class="row-md-1">
		                                <label class="col-lg-2">Localidad: </label>
				                        <span>{{$suceso->localidades[0]->nombre}}</span>
			                        </div>
			                        <p></p>
			                        <div class="row-md-1">
		                                <label class="col-lg-2">Coordenadas: </label>
				                        <span>{{$suceso->coordenadas}}</span>
			                        </div>
			                        <p></p>
			                        <div class="row-md-1">
		                                <label class="col-lg-2">Modalidad: </label>
				                        <span>{{$suceso->modalidad}}</span>
			                        </div>
			                        <p></p>
			                        <div class="row-md-1">
		                                <label class="col-lg-2">Pedido: </label>
				                        <span>{{$suceso->pedido}}</span>
			                        </div>
			                        <p></p>
			                        <div class="row-md-1">
		                                <label class="col-lg-2">Comunidad: </label>
				                        <span>{{$suceso->comunidad}}</span>
			                        </div>
			                        <p></p>
			                        <div class="row-md-1">
		                                <label class="col-lg-2">Cantidad de Personas: </label>
				                        <span>{{$suceso->cant_personas}}</span>
			                        </div>
			                        <p></p>
			                        <div class="row-md-1">
		                                <label class="col-lg-2">Situación:</label>
				                        <strong>{{$suceso->situacion}}</strong>
			                        </div>


			                    </div>
			                    <!-- / TAB Informe------------------------------------------------------------------------------------------------>
			                    <div id="informe" class="tab-pane fade">
			                      <!-- /form-group------------------------------------------------------------------>
			                          <div class="row">
			                            <label class="col-lg-3">Informe</label>
			                            <div class="col-lg-12">
			                                <textarea style="width: 100%; height: 100%" disabled="true">{{$suceso->general}}</textarea>
			                            </div>
			                          </div>
			                    </div>


			                     <div id="mas_datos" class="tab-pane fade">
			                     	<div class="row">
			                     		<label class="col-lg-3">Motivaciones Primarias:</label>
			                        	<span>{{$suceso->motivo_primario}}</span>
			                         </div>
			                         <div class="row">
			                          	<label class="col-lg-3">Motivaciones Secundarias:</label>
			                          	<span>{{$suceso->motivo_secundario}}</span>

			                         </div>
			                         <div class="row">
			                            <label class="col-lg-3">Antecedentes:</label>
			                            <div class="col-lg-12">
			                                <textarea style="width: 100%" disabled="true">{{$suceso->antecedentes}}</textarea>
			                            </div>
			                          </div>
			                     </div>

			                     <div id="personas" class="tab-pane fade">
			                     	<div class="row">
			                     		<label class="col-lg-5">Seleccionar persona para agregarla al suceso:</label>
			                        </div>
			                        <div class="row">
				                        <div class="col-lg-10">
				                        	<form action="{{route('personas.store')}}" method="post" id="formVincular">
		        								@csrf
					                            	<input class="form-control col-sm-1"
										            type="hidden"
										            name="idsus"
										            id="idsus"
										            class="from-control"
										            value="{{$suceso->id}}"
										            autocomplete="off">

					                              <select class="select2" id="select2" name="rela_persona" style="width: 50%;">
					                                <option value ="0">-- Selecciona --</option>
					                             	@foreach($novinculado as $p)
					                                	<option value ="{{$p->id}}">{{$p->apellido}} {{$p->nombre}}</option>
					                              	@endforeach
					                              </select>

					                              <button
				                              	  	type="submit"
				                              	  	name="VincularPersonaBtn"
				                              	  	value="vinc"
				                              	  	id="VincularPersonaBtn"
									                class="btn btn-danger btn-flat">
									                <i class="glyphicon glyphicon-plus">
									                </i> Agregar Persona al Suceso
								                  </button>
								                  <a
								                  	href="#"
								                  	name="CrearPersonaBtn"
								                  	id="CrearPersonaBtn"
								                  	data-toggle="modal"
								                  	data-target="#formModal"
								                  	data-idsus="{{$suceso->id}}"
								                  	data-titulo="Crear Persona y Agregar al Suceso"
								                  	class="btn btn-success btn-flat">
								                  	<i class="glyphicon glyphicon-plus">
									                </i> Crear Nueva Persona
								                  </a>
				                        	</form>
				                         </div>
			                     	</div>
			                     	<hr>
			                     	<div class="row">
			                     		<label class="col-lg-5">Lista de personas relacionadas al suceso:</label>

			                     		<div class="col-lg-12">
			                     			<table id="dataTable" class="table responsive table-bordered table-striped" width="100%" cellspacing="0">
							                <thead>
							                  <tr>
							                    <th>ID</th>
							                    <th>Apellido</th>
							                    <th>Nombre</th>
							                    <th>Doc Nro</th>
							                    <th>Sexo</th>
							                    <th>Edad</th>
							                    <th>Domicilio</th>
							                    <th>Rol en el Suceso</th>
							                    <th>Desvincular</th>
							                  </tr>
							                </thead>
							                  <tbody>
							                   @foreach($suceso->persona as $p)
							                   <tr>
							                    <td>{{$p->persona[0]->id}}</td>
							                    <td>{{$p->persona[0]->apellido}}</td>
							                    <td>{{$p->persona[0]->nombre}}</td>
							                    <td>{{$p->persona[0]->dni_nro}}</td>
							                    <td>{{$p->persona[0]->sexo}}</td>
							                    <td>{{$p->persona[0]->edad}}</td>
							                    <td>{{$p->persona[0]->domicilio}}</td>
							                    <td>{{$p->rol}}</td>
							                    <td style="width: 14%">
							                        <a href="#"
							                            class="btn btn-danger btn-circle"
							                            data-toggle="modal"
							                            data-id="{{$p->id}}"
							                            data-titulo="Quitar Persona del Suceso."
							                            data-target="#deleteVinculo">
							                          <i class="glyphicon glyphicon-trash"></i>
							                        </a>
							                    </td>
							                </tr>
							                @endforeach
							                </tbody>
							              </table>
			                     		</div>
			                        </div>

			                     </div>
			                  <!-- /formaa-group------------------------------------------------------------------------------------------------>
			                </div>
			              </div>
                          <div class="form-group row">
                          	<div class="col-lg-12">
				                <a class="btn btn-warning pull-left" href="{{route('sucesos.index')}}" type="button">Volver</a>
								{{-- <button class="btn btn-danger pull-left" type="reset">Resetear TODOS los campos</button> --}}
								<button class="btn btn-success pull-right" autocomplete="off">Editar</button>

                          	</div>
			              </div>



      <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  <!-- /.content -->

<!-- Eliminar Localidad Modal-->
<div class="modal modal-danger fade" id="deleteVinculo" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Eliminar Vinculo</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="{{route('personas.destroy','delete')}}" id="formDesvincular" method="post">
        {{method_field('delete')}}
        @csrf
        <div class="modal-body">
          <input type="hidden" name="id" id="id" class="form-control">
          <p class="text-center">¿Estas seguro de desvincular a esta persona?</p>
          <div class="modal-footer">
            @include('includes.boton-modal-eliminar')
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

  <!-- Nueva Localidad Modal-->
<div class="modal fade" id="formModal" role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Crear Persona</h4>
      </div>
        <div class="modal-body">
        	<span id="form_result"></span>
	      	<form action="{{route('personas.store')}}" method="post" class="form-horizontal" id="formNuevaPersona">
	        	@csrf
	        	<div class="form-group row">
	        		<input class="col-sm-1"
		            type="hidden"
		            name="idsus"
		            id="idsus"
		            class="from-control"
		            autocomplete="off">

		            <label
		              for="apellido"
		              class="col-sm-3 control-label requerido">
		                Apellido:
		            </label>
		            <input class="col-sm-7"
		            type="text"
		            name="apellido"
		            id="apellido"
		            class="from-control"
		            autocomplete="off">
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
	              for="dni_nro"
	              class="col-sm-3 control-label">
	                DNI Nro:
	            </label>
	            <input class="col-sm-7"
	            type="text"
	            name="dni_nro"
	            id="dni_nro"
	            class="from-control"
	            autocomplete="off">
	          </div>

	          <div class="form-group row">
	            <label
	              for="sexo"
	              class="col-sm-3 control-label">
	                Sexo:
	            </label>
	            <select class="form-control" id="sexo" name="sexo" style="width: 50%;">
	            <option value ="">-- Selecciona --</option>
	            <option value ="Femenino">Femenino</option>
	            <option value ="Masculino">Masculino</option>

	          </select>
	          </div>

	          <div class="form-group row">
	            <label
	              for="edad"
	              class="col-sm-3 control-label">
	                Edad:
	            </label>
	            <input class="col-sm-7"
	            type="text"
	            name="edad"
	            id="edad"
	            class="from-control"
	            autocomplete="off">
	          </div>

	          <div class="form-group row">
	            <label
	              for="domicilio"
	              class="col-sm-3 control-label">
	                Domicilio:
	            </label>
	            <input class="col-sm-7"
	            type="text"
	            name="domicilio"
	            id="domicilio"
	            class="from-control"
	            autocomplete="off">
	          </div>

	          <input type="hidden" name="id" id="id">

	          <div class="modal-footer">
	            @include('includes.boton-modal-crear')
	          </div>
		    </form>
        </div>

    </div>
  </div>
</div>
@endsection

@section('scriptsparticular')
<!-- Select2 -->
<script src="{{asset('theme/lte/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('theme/lte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('theme/lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script src="{{asset('propios/js/personas.js')}}"></script>
@endsection