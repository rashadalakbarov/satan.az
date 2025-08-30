<footer>
    <div class="container">
        <div class="row">
            <div class="footer-content">
                <h1>{{ $company['name'] ?? 'Satan.az' }}</h1>
                <p>Saytın rəhbərliyi reklam bannerlərinin və yerləşdirilmiş elanların məzmununa, şəkillərinə görə məsuliyyət daşımır</p>
                <ul class="custom">
                    @foreach ($socials as $social)
                        @if (!empty($social->value))
                            <li>
                                <a href="{{ $social->value }}" target="_blank">
                                    <i class="fab {{ $social->extra }}"></i>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">                             
                <div class="d-flex align-items-center justify-content-between">
                    <p class="mb-0 px-3 text-center">
                        Copyright &copy; 2020-<?= date("Y") ?> {{ $company['name'] ?? 'Satan.az' }} | Bütün Hüquqlar Qorunur
                    </p>
                    <?php
                        // Cari səhifəni alırıq, misal üçün index.php?page=about
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 'index';
                    ?>
                    <ul class="custom">
                        <li><a href="{{ route('index') }}" class="text-decoration-none">Ana Səhifə</a></li>
                        <li><a href="{{route('about')}}" class="text-decoration-none {{ request()->routeIs('about') ? 'text-danger' : '' }}">Haqqımızda</a></li>
                        <li><a href="{{route('rules')}}" class="text-decoration-none {{ request()->routeIs('rules') ? 'text-danger' : '' }}">Qaydalar</a></li>
                        <li><a href="{{route('contact')}}" class="text-decoration-none {{ request()->routeIs('contact') ? 'text-danger' : '' }}">Əlaqə</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>