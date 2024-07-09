<!DOCTYPE html>
<html lang="fr">
    @include('template.admin.head')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    
    <!-- Navbar -->
    @include('template.admin.nav_header')
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    @include('template.admin.menu_gauche')

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1 class="m-0"> {{ $pageTitle }} </h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              {{-- <li class="breadcrumb-item active">{{ $pageTitle }}</li> --}}
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
     <!-- Main content -->
     <section class="content">
      <div class="container-fluid">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif

         @yield('content')
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    </div>
    <!-- /.content -->
    @include('template.admin.footer')
    
    @include('template.admin.javascript')
    </div>
    
</body>
</html>