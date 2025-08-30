<header id="headerID">
    <div class="container">
        <div class="navbar-container">
            <a href="{{route('index')}}" class="brand">
                <img src="{{ isset($company['logo']) ? asset('/storage/logo/' . $company['logo']) : asset('front/assets/img/logo.png') }}" alt="{{ $company['name'] ?? 'Satan.az' }}">
            </a>
            <div class="button-container">
                <a href="bookmark" class="heart"><i class="far fa-heart"></i></a>
                

                @if(Auth::guard('phone')->check())                
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle ms-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle fs-5"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('profile.index')}}">Şəxsi kabinet</a></li>
                        <li>
                            <a class="dropdown-item" href="{{route('profile.logout')}}">Çıxış</a>
                        </li>
                    </ul>
                </div>
                @else
                    <a href="{{route('login')}}" class="heart"><i class="fas fa-user-circle"></i></a>
                @endif

                <a href="{{route('new.index')}}" class="btn btn-success ctmBorder ms-2">
                    <i class="fas fa-plus"></i> Elan yarat
                </a>
            </div>
        </div>
        <div class="search-container">
            <form class="d-flex" action="" method="post" autocomplete="off">
                <div class="form-group search-form">
                    <input type="text" class="form-control" placeholder="Nümunə, Samsung A7" name="search">
                    <i class="fas fa-search"></i>
                </div>
            </form>
        </div>
    </div>
</header>
<section id="head-section" style="padding-bottom: 10px; padding-top: 10px;">
    <div class="container">
        <div class="category-container">
            @foreach ($categories as $cat)
                <div class="cat-item">
                    <a href="{{ url('elanlar/' . $cat->seflink) }}">
                        <img src="{{ isset($cat->image) ? asset('/storage/categories/' . $cat->image) : asset('front/assets/img/categories/default.png') }}" alt="{{ $cat->seflink }}">
                        {{ $cat->title }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>