@extends('theme.lte.layout')

@section('content')

<!-- ADD THE CLASS sidebar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    @include('theme.lte.header')
    
    @include('theme.lte.aside')
    <!-- Content Wrapper. CONTIENE LA PAGINA VISIBLE DE LA APP -->
    <div class="content-wrapper">
    <!-- Main content -->
    
      @yield('contenido')
    </div>
    @include('theme.lte.footer')
  </div>

<!-- ./wrapper -->
@endsection


