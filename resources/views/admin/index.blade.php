<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Title & Favicon -->
        <title>{{ $company['name'] ?? "Satan.az" }} - Giriş</title>
        <link rel="icon" type="image/x-icon" href="{{ isset($company['logo']) ? asset('/' . $company['logo']) : asset('admin/assets/img/default/logo.png') }}">

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('')}}admin/assets/plugins/fontawesome-free/css/all.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="{{asset('')}}admin/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('')}}admin/assets/css/adminlte.min.css">

        <style>
            .form-control.is-invalid, .was-validated .form-control:invalid {
                background-image:none
            }

            .toast {
                max-width: 450px !important; /* default 300px-dən genişləndir */
                min-width: 350px !important;
            }
        </style>
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <p><b>Admin </b>Panel</p>
            </div>

            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sistemə daxil olmaq üçün məlumatları girməlisiniz</p>

                    <form action="{{route('admin.index.auth')}}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="İstifadəçi adı" name="username" value="{{old('username')}}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                            @error('username') <p class="invalid-feedback">{{ $message }}</p> @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Şifrə" name="password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password') <p class="invalid-feedback">{{ $message }}</p> @enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Daxil Ol</button>
                    </form>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->

        <x-alert-messages />

        <!-- jQuery -->
        <script src="{{asset('')}}admin/assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('')}}admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('')}}admin/assets/js/adminlte.min.js"></script>
    </body>
</html>
