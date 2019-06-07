@extends('theme.lte.inicio')

@section('headparticular')
      <link rel="stylesheet" href="{{asset('theme/lte/bower_components/select2/dist/css/select2.min.css')}}">
@endsection


@section('titulo')
	{{-- ClientesController.edit   --}}
	@isset($clientes)
            Editar Cliente
      @else
            Nuevo Cliente
      @endisset


@endsection

@section('contenido')
	<section class="content-header">
		<h1>
			Sucesos
			@isset($clientes)
				<small>Editar Cliente</small>
			@else
				<small>Crear Cliente</small>
			@endisset

	    </h1>
		@include('partials.messages')
	</section>
	    <!-- Main content -->
    <section class="content">
    	<div class="row">
        	<div class="col-xs-12">

				@isset($clientes)
					<form action="{{route('clientes.update', 'edit')}}" method="post" id="formClienteEditar">
					{{method_field('patch')}}
					<input type="hidden" value="{{$clientes->id}}" name="id"/>

				@else
					<form action="{{route('clientes.store')}}" method="post" id="formClienteNuevo">
				@endisset
				@csrf

			        <div class="nav-tabs-custom">
			            <ul class="nav nav-tabs">
			                <li class="active" ><a href="#datos_personales" data-toggle="tab">Datos Personales</a></li>
							<li><a href="#domicilio" data-toggle="tab">Domicilio</a></li>
							<li><a href="#contacto" data-toggle="tab">Contacto</a></li>
							<li><a href="#laboral" data-toggle="tab">Laboral</a></li>
							<li><a href="#garante" data-toggle="tab">Garante</a></li>
							<li><a href="#crediticio" data-toggle="tab">Crediticio</a></li>
						</ul>
			            <div class="tab-content col">
							<!--  DATOS PERSONALES ------------------------------------------------------------------------------------------------>
							<div id="datos_personales" class="tab-pane fade in active">
								<div class="form-group row">
									<div class="col-md-4">
										<p class="input-group">
											<label class="requerido">Apellido</label>
											@isset($clientes)
												<input type="text" value="{{old('apellido',$clientes->apellido)}}" id="apellido" name="apellido" class="form-control"/>
											@else
												<input type="text" id="apellido" name="apellido" class="form-control"/>
											@endisset
			                            </p>
			                        </div>
			                        <div class="col-md-4">
			                            <p class="input-group">
			                            	<label class="requerido">Nombre</label>
											@isset($clientes)
												<input type="text" value="{{old('nombre',$clientes->nombre)}}"  id="nombre" name="nombre" class="form-control"/>
											@else
												<input type="text" id="nombre" name="nombre" class="form-control"/>
											@endisset
			                            </p>
									</div>
								</div>
			                      <!-- /form-group------------------------------------------------------------------------------------------------>
			                    <div class="form-group row">
			                        <div class="col-md-4">
			                            <p class="input-group">
											<label>Tipo de Documento</label>
											@isset($clientes)
												<select class="form-control select" id="doc_tipo" name="doc_tipo" style="width: 100%;">
													<option value="DNI" {{$clientes->doc_tipo == 'DNI' ? 'selected' : ''}}>DNI</option>
													<option value="CI"  {{$clientes->doc_tipo == 'CI' ? 'selected' : ''}}>CI</option>
													<option value="LC"  {{$clientes->doc_tipo == 'LC' ? 'selected' : ''}}>LC</option>
													<option value="LE"  {{$clientes->doc_tipo == 'LE' ? 'selected' : ''}}>LE</option>
													<option value="PASAPORTE" {{$clientes->doc_tipo == 'PASAPORTE' ? 'selected' : ''}} >PASAPORTE</option>
													<option value="OTRO" {{$clientes->doc_tipo == 'OTRO' ? 'selected' : ''}} >OTRO</option>
												</select>
											@else
												<select class="form-control select" id="doc_tipo" name="doc_tipo" style="width: 100%;">
													<option value="">-- Selecciona --</option>
													<option value="DNI">DNI</option>
													<option value="CI">CI</option>
													<option value="LC">LC</option>
													<option value="LE">LC</option>
													<option value="PASAPORTE">PASAPORTE</option>
													<option value="OTRO">OTRO</option>
												</select>
											@endisset

			                            </p>
									</div>

			                        <div class="col-md-4">
			                        	<p class="input-group">
			                            <label>Número de Documento</label>
											@isset($clientes)
												<input type="text" value="{{old('doc_nro',$clientes->doc_nro)}}" id="doc_nro" name="doc_nro" class="form-control"/>
											@else
												<input type="text" id="doc_nro" name="doc_nro" class="form-control"/>
											@endisset
			                            </p>
			                        </div>
								</div>
								<div class="form-group row">
									<div class="col-md-4">
										<p class="input-group">
											<label>Condición IVA</label>
											@isset($clientes)
												<select class="form-control select" id="condicion_iva" name="condicion_iva" style="width: 100%;">
													<option value="CONSUMIDOR_FINAL" {{$clientes->condicion_iva == 'CONSUMIDOR_FINAL' ? 'selected' : ''}}>CONSUMIDOR_FINAL</option>
													<option value="IVA_EXENTO"  {{$clientes->condicion_iva == 'IVA_EXENTO' ? 'selected' : ''}}>IVA_EXENTO</option>
													<option value="MONOTRIBUTO"  {{$clientes->condicion_iva == 'MONOTRIBUTO' ? 'selected' : ''}}>MONOTRIBUTO</option>
													<option value="RESPONSABLE_INSCRIPTO"  {{$clientes->condicion_iva == 'RESPONSABLE_INSCRIPTO' ? 'selected' : ''}}>RESPONSABLE_INSCRIPTO</option>
												</select>
											@else
												<select class="form-control select" id="condicion_iva" name="condicion_iva" style="width: 100%;">
													<option value="">-- Selecciona --</option>
													<option value="CONSUMIDOR_FINAL">DNI</option>
													<option value="IVA_EXENTO">CI</option>
													<option value="MONOTRIBUTO">LC</option>
													<option value="RESPONSABLE_INSCRIPTO">LC</option>
												</select>
											@endisset
										</p>
									</div>
								</div>
			                    <div class="form-group row">
			                        <div class="col-md-4">
			                            <p class="input-group">
			                            	<label class="requerido">Fecha de Nacimiento</label>
											@isset($clientes)
												<input type="text" value="{{old('fecha_nac',$clientes->fecha_nac)}}" id="fecha_nac" name="fecha_nac" class="form-control"/>
											@else
												<input type="text" id="fecha_nac" name="fecha_nac" class="form-control"/>
											@endisset
			                            </p>
									</div>
									<div class="col-md-4">
			                            <p class="input-group">
				                            <label>Nacionalidad</label>
											@isset($clientes)
												<select class="form-control select" id="nacionalidad" name="nacionalidad" style="width: 100%;">
													<option value="ARGENTINA" {{$clientes->nacionalidad == 'ARGENTINA' ? 'selected' : ''}}>ARGENTINA</option>
													<option value="BOLIVIA"  {{$clientes->nacionalidad == 'BOLIVIA' ? 'selected' : ''}}>BOLIVIA</option>
													<option value="BRASIL"  {{$clientes->nacionalidad == 'BRASIL' ? 'selected' : ''}}>BRASIL</option>
													<option value="CHILE"  {{$clientes->nacionalidad == 'CHILE' ? 'selected' : ''}}>CHILE</option>
													<option value="PARAGUAY" {{$clientes->nacionalidad == 'PARAGUAY' ? 'selected' : ''}} >PARAGUAY</option>
													<option value="PERÚ" {{$clientes->nacionalidad == 'PERÚ' ? 'selected' : ''}} >PERÚ</option>
												</select>
											@else
												<select class="form-control select" id="nacionalidad" name="nacionalidad" style="width: 100%;">
													<option value="">-- Selecciona --</option>
													<option value="ARGENTINA">ARGENTINA</option>
													<option value="BOLIVIA">BOLIVIA</option>
													<option value="BRASIL">BRASIL</option>
													<option value="CHILE">CHILE</option>
													<option value="PARAGUAY">PARAGUAY</option>
													<option value="PERÚ">PERÚ</option>
												</select>
											@endisset
										</p>
									</div>
								</div>


			                    <div class="form-group row">
			                        <label for="estado_civil" class="col-sm-2 control-label">Estado Civil</label>
			                        <div class="col-sm-10">
										@isset($clientes)
											<select class="form-control select" id="estado_civil" name="estado_civil" style="width: 100%;">
												<option value="CASADO" {{$clientes->estado_civil == 'CASADO' ? 'selected' : ''}}>CASADO</option>
												<option value="CONCUBINADO"  {{$clientes->estado_civil == 'CONCUBINADO' ? 'selected' : ''}}>CONCUBINADO</option>
												<option value="SOLTERO"  {{$clientes->estado_civil == 'SOLTERO' ? 'selected' : ''}}>SOLTERO</option>
												<option value="VIUDO"  {{$clientes->estado_civil == 'VIUDO' ? 'selected' : ''}}>VIUDO</option>
											</select>
										@else
											<select class="form-control select" id="estado_civil" name="estado_civil" style="width: 100%;">
												<option value="">-- Selecciona --</option>
												<option value="CASADO">CASADO</option>
												<option value="CONCUBINADO">CONCUBINADO</option>
												<option value="SOLTERO">SOLTERO</option>
												<option value="VIUDO">VIUDO</option>
											</select>
										@endisset
			                        </div>
			                    </div>
			                </div>

							<!-- tab  DOMICILIO ------------------------------------------------------------------------------------------>
							<div id="domicilio" class="tab-pane fade fade">
								<div class="form-group row">
									<label for="domi_provincia" class="col-lg-2 control-label">Provincia</label>
									<div class="col-lg-5">
										@isset($clientes)
											<input type="text" value="{{old('domi_provincia',$clientes->domi_provincia)}}" id="domi_provincia" name="domi_provincia" class="form-control"/>
										@else
											<input type="text" class="form-control" id="domi_provincia" name="domi_provincia">
										@endisset

									</div>
									<label for="domi_localidad" class="col-lg-2 control-label">Localidad</label>
									<div class="col-lg-5">
										@isset($clientes)
											<input type="text" value="{{old('domi_localidad',$clientes->domi_localidad)}}" id="domi_localidad" name="domi_localidad" class="form-control"/>
										@else
											<input type="text" class="form-control" id="domi_localidad" name="domi_localidad">
										@endisset

									</div>
									<label for="domi_direccion" class="col-lg-2 control-label">Dirección</label>
									<div class="col-lg-5">
										@isset($clientes)
											<input type="text" value="{{old('domi_direccion',$clientes->domi_direccion)}}" id="domi_direccion" name="domi_direccion" class="form-control"/>
										@else
											<input type="text" class="form-control" id="domi_direccion" name="domi_direccion">
										@endisset

									</div>
								</div>
							</div>
			                <!-- / TAB CONTACTO ------------------------------------------------------------------------------------------------>
							<div id="contacto" class="tab-pane fade">
								<div class="form-group row">
									<label for="c_telefono" class="col-lg-2">Teléfono</label>
									<div class="col-lg-5">
										@isset($clientes)
											<input type="text" value="{{old('c_telefono',$clientes->c_telefono)}}" id="c_telefono" name="c_telefono" class="form-control"/>
										@else
											<input type="text" id="c_telefono" name="c_telefono" class="form-control"/>
										@endisset

									</div>
								</div>
								<div class="form-group row">
									<label for="c_celular" class="col-lg-2">Celular</label>
									<div class="col-lg-5">
										@isset($clientes)
											<input type="text" value="{{old('c_celular',$clientes->c_celular)}}" id="c_celular" name="c_celular" class="form-control"/>
										@else
											<input type="text" id="c_celular" name="c_celular" class="form-control"/>
										@endisset

									</div>
								</div>
								<div class="form-group row">
									<label for="c_mail" class="col-lg-2">Correo Electrónico</label>
									<div class="col-lg-5">
										@isset($clientes)
											<input type="text" value="{{old('c_mail',$clientes->c_mail)}}" id="c_mail" name="c_mail" class="form-control"/>
										@else
											<input type="text" id="c_mail" name="c_mail" class="form-control"/>
										@endisset

									</div>
								</div>
							</div>
							<!-- / tab LABORAL  ------------------------------------------------------------------------------------------------>
							<div id="laboral" class="tab-pane fade">
								<div class="form-group row">
									<label for="lab_ocupacion" class="col-md-1">Ocupación</label>
									<div class="col-md-4">
										@isset($clientes)
											<input type="text" value="{{old('lab_ocupacion',$clientes->lab_ocupacion)}}" id="lab_ocupacion" name="lab_ocupacion" class="form-control"/>
										@else
											<input type="text" id="lab_ocupacion" name="lab_ocupacion" class="form-control"/>
										@endisset
									</div>
								</div>
								<div class="form-group row">
									<label for="lab_empleador" class="col-md-1">Empleador</label>
									<div class="col-md-4">
										@isset($clientes)
											<input type="text" value="{{old('lab_empleador',$clientes->lab_empleador)}}" id="lab_empleador" name="lab_empleador" class="form-control"/>
										@else
											<input type="text" id="lab_empleador" name="lab_empleador" class="form-control"/>
										@endisset
									</div>
								</div>
								<div class="form-group row">
									<label for="lab_seccion" class="col-md-1">Sección</label>
									<div class="col-md-4">
										@isset($clientes)
											<input type="text" value="{{old('lab_seccion',$clientes->lab_seccion)}}" id="lab_seccion" name="lab_seccion" class="form-control"/>
										@else
											<input type="text" id="lab_seccion" name="lab_seccion" class="form-control"/>
										@endisset
									</div>
								</div>
								<div class="form-group row">
									<label for="lab_puesto" class="col-md-1">Puesto</label>
									<div class="col-md-4">
										@isset($clientes)
											<input type="text" value="{{old('lab_puesto',$clientes->lab_puesto)}}" id="lab_puesto" name="lab_puesto" class="Puestom-control"/>
										@else
											<input type="text" id="lab_puesto" name="lab_puesto" class="Puestom-control"/>
										@endisset
									</div>
								</div>
								<div class="form-group row">
									<label for="lab_antiguedad" class="col-md-1">Antigüedad</label>
									<div class="col-md-4">
										@isset($clientes)
											<input type="text" value="{{old('lab_antiguedad',$clientes->lab_antiguedad)}}" id="lab_antiguedad" name="lab_antiguedad" class="form-control"/>
										@else
											<input type="text" id="lab_antiguedad" name="lab_antiguedad" class="form-control"/>
										@endisset
									</div>
								</div>
								<div class="form-group row">
									<label for="lab_legajo" class="col-md-1">Legajo</label>
									<div class="col-md-4">
										@isset($clientes)
											<input type="text" value="{{old('lab_legajo',$clientes->lab_legajo)}}" id="lab_legajo" name="lab_legajo" class="form-control"/>
										@else
											<input type="text" id="lab_legajo" name="lab_legajo" class="form-control"/>
										@endisset
									</div>
								</div>
								<div class="form-group row">
									<label for="lab_direccion" class="col-md-1">Domicilio Laboral</label>
									<div class="col-md-4">
										@isset($clientes)
											<input type="text" value="{{old('lab_direccion',$clientes->lab_direccion)}}" id="lab_direccion" name="lab_direccion" class="form-control"/>
										@else
											<input type="text" id="lab_direccion" name="lab_direccion" class="form-control"/>
										@endisset
									</div>
								</div>
								<div class="form-group row">
									<label for="lab_telefono" class="col-md-1">Teléfono</label>
									<div class="col-md-4">
										@isset($clientes)
											<input type="text" value="{{old('lab_telefono',$clientes->lab_telefono)}}" id="lab_telefono" name="lab_telefono" class="form-control"/>
										@else
											<input type="text" id="lab_telefono" name="lab_telefono" class="form-control"/>
										@endisset
									</div>
								</div>
								<div class="form-group row">
									<label for="lab_recibosueldo" class="col-md-1">Tiene recibo de sueldo</label>
									<div class="col-md-4">
											@isset($clientes)
											<select class="form-control select" id="lab_recibosueldo" name="lab_recibosueldo" style="width: 100%;">
												<option value="SÍ" {{$clientes->lab_recibosueldo == 'SÍ' ? 'selected' : ''}}>SÍ</option>
												<option value="NO"  {{$clientes->lab_recibosueldo == 'NO' ? 'selected' : ''}}>NO</option>
												<option value="OTROS"  {{$clientes->lab_recibosueldo == 'OTROS' ? 'selected' : ''}}>OTROS</option>
											</select>
										@else
											<select class="form-control select" id="lab_recibosueldo" name="lab_recibosueldo" style="width: 100%;">
												<option value="">-- Selecciona --</option>
												<option value="SÍ">SÍ</option>
												<option value="NO">NO</option>
												<option value="OTROS">OTROS</option>
											</select>
										@endisset
									</div>
								</div>
								<div class="form-group row">
									<label for="lab_sueldo" class="col-md-1">Sueldo</label>
									<div class="col-md-4">
										@isset($clientes)
											<input type="number" value="{{old('lab_sueldo',$clientes->lab_sueldo)}}" id="lab_sueldo" name="lab_sueldo" class="form-control"/>
										@else
											<input type="number" id="lab_sueldo" name="lab_sueldo" class="form-control"/>
										@endisset
									</div>
								</div>
								<div class="form-group row">
									<label for="lab_otrosingresos" class="col-md-1">Otros Ingresos</label>
									<div class="col-md-4">
										@isset($clientes)
											<input type="number" value="{{old('lab_otrosingresos',$clientes->lab_otrosingresos)}}" id="lab_otrosingresos" name="lab_otrosingresos" class="form-control"/>
										@else
											<input type="number" id="lab_otrosingresos" name="lab_otrosingresos" class="form-control"/>
										@endisset
									</div>
								</div>
								<div class="form-group row">
									<label for="lab_notas" class="col-md-1">Notas</label>
									<div class="col-md-6">
										@isset($clientes)
											<input type="number" value="{{old('lab_notas',$clientes->lab_notas)}}" id="lab_notas" name="lab_notas" class="form-control"/>
										@else
											<input type="number" id="lab_notas" name="lab_notas" class="form-control"/>
										@endisset
									</div>
								</div>
							</div>
			                <div id="garante" class="tab-pane fade">
								<div class="form-group row">
									<label for="garante_nombre" class="col-md-1">Nombre completo</label>
									<div class="col-md-4">
										@isset($clientes)
											<input type="text" value="{{old('garante_nombre',$clientes->garante_nombre)}}" id="garante_nombre" name="garante_nombre" class="form-control"/>
										@else
											<input type="text" id="garante_nombre" name="garante_nombre" class="form-control"/>
										@endisset
									</div>
								</div>
								<div class="form-group row">
									<label for="garante_documento" class="col-md-1">Nro Documento</label>
									<div class="col-md-4">
										@isset($clientes)
											<input type="text" value="{{old('garante_documento',$clientes->garante_documento)}}" id="garante_documento" name="garante_documento" class="form-control"/>
										@else
											<input type="text" id="garante_documento" name="garante_documento" class="form-control"/>
										@endisset
									</div>
								</div>
								<div class="form-group row">
									<label for="garante_domicilio" class="col-md-1">Domicilio</label>
									<div class="col-md-4">
										@isset($clientes)
											<input type="text" value="{{old('garante_domicilio',$clientes->garante_domicilio)}}" id="garante_domicilio" name="garante_domicilio" class="form-control"/>
										@else
											<input type="text" id="garante_domicilio" name="garante_domicilio" class="form-control"/>
										@endisset
									</div>
								</div>
								<div class="form-group row">
									<label for="garante_telefono" class="col-md-1">Teléfono</label>
									<div class="col-md-4">
										@isset($clientes)
											<input type="text" value="{{old('garante_telefono',$clientes->garante_telefono)}}" id="garante_telefono" name="garante_telefono" class="Puestom-control"/>
										@else
											<input type="text" id="garante_telefono" name="garante_telefono" class="Puestom-control"/>
										@endisset
									</div>
								</div>
								<div class="form-group row">
									<label for="garante_mail" class="col-md-1">Correo Electrónico</label>
									<div class="col-md-4">
										@isset($clientes)
											<input type="text" value="{{old('garante_mail',$clientes->garante_mail)}}" id="garante_mail" name="garante_mail" class="form-control"/>
										@else
											<input type="text" id="garante_mail" name="garante_mail" class="form-control"/>
										@endisset
									</div>
								</div>
								<div class="form-group row">
									<label for="garante_ocupacion" class="col-md-1">Ocupación</label>
									<div class="col-md-4">
										@isset($clientes)
											<input type="text" value="{{old('garante_ocupacion',$clientes->garante_ocupacion)}}" id="garante_ocupacion" name="garante_ocupacion" class="form-control"/>
										@else
											<input type="text" id="garante_ocupacion" name="garante_ocupacion" class="form-control"/>
										@endisset
									</div>
								</div>
								<div class="form-group row">
									<label for="garante_sueldo" class="col-md-1">Sueldo</label>
									<div class="col-md-4">
										@isset($clientes)
											<input type="number" value="{{old('garante_sueldo',$clientes->garante_sueldo)}}" id="garante_sueldo" name="garante_sueldo" class="form-control"/>
										@else
											<input type="number" id="garante_sueldo" name="garante_sueldo" class="form-control"/>
										@endisset
									</div>
								</div>
								<div class="form-group row">
									<label for="garante_notas" class="col-md-1">Notas</label>
									<div class="col-md-4">
										@isset($clientes)
											<input type="text" value="{{old('garante_notas',$clientes->garante_notas)}}" id="garante_notas" name="garante_notas" class="form-control"/>
										@else
											<input type="text" id="garante_notas" name="garante_notas" class="form-control"/>
										@endisset
									</div>
								</div>

							</div>
							<!-- / TAB CONTACTO ------------------------------------------------------------------------------------------------>
							<div id="crediticio" class="tab-pane fade">
								<div class="form-group row">
									<label for="credito_limite" class="col-lg-1">Límite de Crédito</label>
									<div class="col-lg-2">
										@isset($clientes)
											<input type="text" value="{{old('credito_limite',$clientes->credito_limite)}}" id="credito_limite" name="credito_limite" class="form-control"/>
										@else
											<input type="text" id="credito_limite" name="credito_limite" class="form-control"/>
										@endisset

									</div>
								</div>
								<div class="form-group row">
									<label for="credito_limite" class="col-lg-1">Calificación</label>
									<div class="col-md-1">
										@isset($clientes)
											<input type="number" value="{{old('credito_limite',$clientes->credito_limite)}}" id="credito_limite" name="credito_limite" class="form-control"/>
										@else
											<input type="number" id="credito_limite" name="credito_limite" class="form-control"/>
										@endisset

									</div>
								</div>
							</div>
			            </div>
			        </div>

                    <div class="form-group row">
						<div class="col-md-8">
							<button class="btn btn-warning pull-left" type="button" data-dismiss="modal">Cancelar</button>
							<button class="btn btn-success pull-right" type="submit" id="submit" autocomplete="off">Guardar</button>
						</div>
			        </div>
			</form>
      <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  <!-- /.content -->
@endsection

@section('scriptsparticular')
	<!-- Select2 -->
	<script src="{{asset('theme/lte/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
	<script>
	$(function () {
		//Initialize Select2 Elements
		$('.select2').select2()
	})
	</script>

@endsection
