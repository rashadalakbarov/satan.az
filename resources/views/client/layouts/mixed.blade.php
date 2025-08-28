<!DOCTYPE html>
<html lang="az">
    <head>
        <!-- Montserrat fonts include -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Meta Tags -->
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="Rashad Alakbarov, 0558215673">
        <meta name="description" content="Pulsuz elanlar saytı">
        <meta name="keywords" content="pulsuz elanlar, elanlar, bedava, pulsuz, elan, elanlar, yeni elanlar, avtomobil, daşınmaz əmlak">
        <meta http-equiv="refresh" content="1800">
        <meta name="revisit-after" content="1 days">
        <meta data-rh="true" id="meta-description" name="description" content="Pulsuz Elan Yerləşdir - Maşın, Mənzil, Telefon, Geyim, Məişət texnikası...">

        <!-- Title & Favicon -->
        <title>{{ $company['name'] ?? "Satan.az" }} | @yield('title', 'Pulsuz Elanlar Saytı')</title>
        <link rel="shortcut icon" href="{{ isset($company['favicon']) ? asset('/storage/favicon/' . $company['favicon']) : asset('front/assets/img/favicon.png') }}" type="image/jpg">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Fontawesome -->
        <link rel="stylesheet" href="{{asset('')}}front/assets/plugins/fontawesome-free-5.15.2/css/all.css" />

        <!-- summernote css -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

        <!-- OwlCarousel2-2.3.4 CSS -->
        <link rel="stylesheet" href="{{asset('')}}front/assets/plugins/OwlCarousel2-2.3.4/owl.carousel.css" />
        <link rel="stylesheet" href="{{asset('')}}front/assets/plugins/OwlCarousel2-2.3.4/owl.theme.default.css" />

        <!-- Swiper CSS -->
        <link rel="stylesheet" href="{{asset('')}}front/assets/plugins/swiper/swiper-bundle.css"/>

        <!-- Fancybox CSS -->
        <link rel="stylesheet" href="{{asset('')}}front/assets/plugins/fancybox/jquery.fancybox.css"/>

        <!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('')}}front/assets/css/style.css">
        <link rel="stylesheet" href="{{asset('')}}front/assets/css/responsive.css">

        @yield('css')
    </head>
    <body>
        @include('client.layouts.header')

        <div class="container">
            @yield('content')
        </div>

        @include('client.layouts.footer')

        <div class="preloader">
            <img src="{{asset('')}}front/assets/img/icons/loading.gif" alt="loading">
        </div>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>


        <!-- plugins JS -->
        <script src="{{asset('')}}front/assets/plugins/swiper/swiper-bundle.js"></script>
        <script src="{{asset('')}}front/assets/plugins/isotope/isotope.pkgd.js"></script>
        <script src="{{asset('')}}front/assets/plugins/fancybox/jquery.fancybox.js"></script>
        <script src="{{asset('')}}front/assets/plugins/watermark/jquery.watermark.js"></script>
        <script src="{{asset('')}}front/assets/plugins/OwlCarousel2-2.3.4/owl.carousel.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Main JS (bütün gizli kodlar burdadır) -->
        <script src="{{asset('')}}front/assets/js/main.min.js"></script>

        <x-sweet-alert2 />

        @yield('javascript')
    </body>
</html>
