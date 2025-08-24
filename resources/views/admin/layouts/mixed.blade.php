<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <!-- Title & Favicon -->
        <title>{{ $company['name'] ?? "Satan.az" }} - @yield('title')</title>
        <link rel="icon" type="image/x-icon" href="{{ isset($company['logo']) ? asset('/' . $company['logo']) : asset('admin/assets/img/default/logo.png') }}">

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('')}}admin/assets/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('')}}admin/assets/css/adminlte.min.css">

      @yield('css')
    </head>
    <body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            @include('admin.layouts.navbar')

            @include('admin.layouts.aside')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>@yield('title')</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    @if (!request()->routeIs('admin.dashboard'))
                                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Ana səhifə /</a></li>
                                    @endif 
                                    <li class="breadcrumb-item active">@yield('title')</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

              <!-- Main content -->
              <section class="content">

                @yield('content')

              </section>
              <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            @include('admin.layouts.footer')
        </div>
        <!-- ./wrapper -->

        <x-alert-messages />

        <!-- jQuery -->
        <script src="{{asset('')}}admin/assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('')}}admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('')}}admin/assets/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('')}}admin/assets/js/demo.js"></script>

        @yield('js')
    </body>
</html>
