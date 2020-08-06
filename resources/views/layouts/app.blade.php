<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edu-Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    {{--
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css"> --}}
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->

    <link href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}" rel="stylesheet">
    <!-- Daterange picker -->

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/dashboard" class="nav-link">Home</a>
                </li>





        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->


        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">

                <span class="brand-text font-weight-light">EDU</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                    <div class="info">
                        <a href="/dashbord" class="d-block">

                            @if (Auth::guest())

                            @else

                                {{ auth()->user()->name }}


                            @endif
                        </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">



                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->



                        @if (Auth::guest())

                        @else

                            @foreach (auth()
        ->user()
        ->getRoleNames()
    as $item)
                                @if ($item == 'admin')

                                    <li class="nav-item has-treeview menu-open">
                                        <a href="#" class="nav-link active">
                                            <i class="nav-icon fas fa-tachometer-alt"></i>
                                            <p>
                                                Dashboard
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item ">
                                                <a href="/schools" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Schools</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="/departments" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Departments</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="/curricula" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Curricula</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="/suggests" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Suggests</p>
                                                </a>
                                            </li>


                                @endif

                            @endforeach


                        @endif




                        @if (Auth::guest())

                        @else

                            @foreach (auth()
        ->user()
        ->getRoleNames()
    as $item)
                                @if ($item == 'super-admin')
                                    <li class="nav-item">
                                        <a href="/users" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Users</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">

                                            @csrf

                                            <button class="btn btn-danger" name="submit" type="submit"> LOGOUT</button>
                                        </form>
                                        {{-- <i class="far fa-circle nav-icon"></i>
                                        --}}

                                        </a>
                                    </li>

                                @endif

                            @endforeach


                        @endif








                    </ul>
                    </li>


                    </ul>




                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>




        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            @yield('content')
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->


























            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong><a href="codeforiraq.org">code for iraq</strong>
            All rights reserved.

        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    {{--
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script> --}}
    <!-- JQVMap -->
    {{-- <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script> --}}


    <!-- jQuery Knob Chart -->
    {{-- <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    --}}
    <!-- daterangepicker -->
    {{-- <script src="plugins/moment/moment.min.js"></script>
    --}}
    {{-- <script src="plugins/daterangepicker/daterangepicker.js"></script>
    --}}
    <!-- Tempusdominus Bootstrap 4 -->
    {{-- <script
        src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    --}}
    <!-- Summernote -->
    {{-- <script src="plugins/summernote/summernote-bs4.min.js"></script>
    --}}
    <!-- overlayScrollbars -->
    {{-- <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js">
    </script> --}}
    <!-- AdminLTE App -->
    {{-- <script src="dist/js/adminlte.js"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {{-- <script src="dist/js/pages/dashboard.js"></script>
    --}}
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="dist/js/demo.js"></script> --}}




    <script src="{{ asset('dist/js/demo.js') }}" defer></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="{{ asset('dist/js/pages/dashboard.js') }}" defer></script>
    <script src="{{ asset('dist/js/adminlte.js') }}" defer></script>
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}" defer></script>
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}" defer></script>
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}" defer></script>

    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}" defer></script>
    <script src="{{ asset('plugins/moment/moment.min.js') }}" defer></script>
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}" defer></script>
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}" defer></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    {{-- <script src="{{ asset('js/bootstrap.js') }}" defer></script>
    --}}
</body>

</html>
