 <header class="main-header">
      <!-- Logo -->
      <a href="{{route('home')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>S</b>C</span>
        <!-- logo for regular state and mobile devices -->

        <span class="logo-lg">
          <img src="{{asset('img/avatar3.png')}}" style="height: 20px">
          <b>Sigic</b>
        </span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Navegación</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{asset('img/avatar1.png')}}" class="user-image" alt="User Image">
                <span class="hidden-xs">{{ Auth::user()->surname }} {{ Auth::user()->name }}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="{{asset('img/avatar1.png')}}" class="img-circle" alt="User Image">

                  <p>
                    {{ Auth::user()->surname }} {{ Auth::user()->name }}
                    <small>
                       @if(Auth::user()->hasRole('admin'))
                        Administrador
                       @else
                        Usuario
                       @endif
                    </small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="{{route('perfil')}}" class="btn btn-default btn-flat">Mi Cuenta</a>
                  </div>
                  <div class="pull-right">
                      <a class="btn btn-primary" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Cerrar Sesión') }}
                    </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>