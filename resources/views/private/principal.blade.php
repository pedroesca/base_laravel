@extends('theme.lte.inicio')

@section('headparticular')

<!-- fullCalendar -->
  <link rel="stylesheet" href="{{asset('theme/lte/bower_components/fullcalendar/dist/fullcalendar.min.css')}}">
  <link rel="stylesheet" href="{{asset('theme/lte/bower_components/fullcalendar/dist/fullcalendar.print.min.css')}}" media="print">

@endsection


@section('titulo')
Inicio | Sigic
@endsection

@section('contenido')
    <section class="content-header">
      <h1>
        Provincia de Formosa
        <small>Inicio</small>
      </h1>
      {{-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol> --}}
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- /.col -->
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-body no-padding">
            <!-- THE CALENDAR -->
            <div id="calendar"></div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /. box -->
      </div>
      <!-- Small boxes (Stat box) -->
      <div class="col-md-6">
        <!-- ./col -->
        <div class="row-lg-3">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$sucesos->where('situacion','VIGENTE')->count()}}</h3>

              <p>Vigentes</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-exclamation-sign"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="row-lg-3">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$sucesos->where('situacion','NO VIGENTE')->count()}}</h3>

              <p>No Vigentes</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-remove-sign"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="row-lg-3">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$sucesos->where('situacion','RESUELTO')->count()}}</h3>
              <p>Resueltos</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-ok-sign"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="row-lg-3">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$sucesos->where('situacion','OTRO')->count()}}</h3>

              <p>Novedad</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-info-sign"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->


@endsection


@section('scriptsparticular')

<!-- jQuery UI 1.11.4 -->
<script src="{{asset('theme/lte/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>



<!-- fullCalendar -->
<script src="{{asset('theme/lte/bower_components/moment/moment.js')}}"></script>
<script src="{{asset('theme/lte/bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>

<script src="{{asset('propios/js/calendario.js')}}"></script>
<script src="{{asset('theme/lte/bower_components/fullcalendar/dist/locale/es.js')}}"></script>



@endsection