
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('img/about1.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">

          <a href="{{route('perfil')}}"><i class="fa fa-circle text-success"></i>{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu</li>
        <li>
          <a href="/">
            <i class="fa fa-home"></i> <span>Inicio</span>
          </a>
        </li>
        <li>
        <li>

          <a href="#">
            <i class="fa fa-calendar"></i> <span>Sucesos</span>
           {{--  <span class="pull-right-container">
              <small class="label pull-right bg-red">{{$sucesos->count()}}</small>
              <small class="label pull-right bg-green">{{$sucesos->count()}}</small>
            </span> --}}
          </a>
        </li>

        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Datos Auxiliares</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="{{route('clientes.index')}}">
                <i class="fa fa-table"></i> <span>Clientes</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-table"></i> <span>item x</span>
              </a>
            </li>
          </ul>
        </li>






        @if(Auth::user()->hasRole('admin'))
        <li>
          <a href="{{route('micuenta.index')}}">
            <i class="fa fa-user"></i> <span>Usuarios</span>
            {{-- <span class="pull-right-container">
              <small class="label pull-right bg-yellow">{{Auth::user()->count()}}</small>
            </span> --}}
          </a>
        </li>
        @endif

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>