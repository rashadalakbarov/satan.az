<header id="headerID">
    <div class="container">
        <div class="navbar-container">
            <a href="{{route('index')}}" class="brand">
                <img src="{{ isset($company['logo']) ? asset('/' . $company['logo']) : asset('admin/assets/img/default/logo.png') }}" alt="{{ $company['name'] ?? 'Satan.az' }}">
            </a>
            <div class="button-container">
                <a href="bookmark" class="heart"><i class="far fa-heart"></i></a>
                <a href="" class="heart"><i class="fas fa-user-circle"></i></a>
                <a href="" class="btn btn-success ctmBorder">
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
                        <img src="{{ asset('storage/categories/' . $cat->image) }}" alt="{{ $cat->seflink }}">
                        {{ $cat->title }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>