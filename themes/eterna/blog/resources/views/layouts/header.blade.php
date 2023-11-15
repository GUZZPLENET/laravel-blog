<header class="navbar-light navbar-sticky header-static">
    <!-- Logo Nav START -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home')  }}">
                <img class="navbar-brand-item light-mode-item" src="{{ asset('upload/'.$settings->headerLogo) }}" alt="logo">
                <img class="navbar-brand-item dark-mode-item" src="{{ asset('upload/'.$settings->headerLogo) }}" alt="logo">
            </a>

            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="text-body h6 d-none d-sm-inline-block">Menu</span>
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav navbar-nav-scroll mx-auto">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('home') }}">Anasayfa</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('categories') }}">Kategoriler</a></li>
                    @if(request()->is('dashboard*'))
                        <li class="nav-item"> <a class="nav-link" href="{{ route('dashboard.posts') }}">Blogları düzenle</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('dashboard.categories') }}">Kategorileri düzenle</a></li>
                    @endif
                </ul>
            </div>

            <div class="nav flex-nowrap align-items-center">
                @auth()
                    <div class="nav-item ms-2 ms-md-3 dropdown me-2">
                        <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="avatar-img rounded-circle" src="{{ asset('upload/'.Auth::user()->image) }}" alt="avatar">
                        </a>

                        <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
                            <li class="px-3">
                                <div class="d-flex align-items-center">
                                    <div class="avatar me-3">
                                        <img class="avatar-img rounded-circle shadow" src="{{ asset('upload/'.Auth::user()->image) }}" alt="avatar">
                                    </div>
                                    <div>
                                        <a class="h6 mt-2 mt-sm-0" href="{{ route('profile') }}"> {{ Auth::user()->name . ' ' . Auth::user()->surname }}</a>
                                        <p class="small m-0">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                                <hr>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('post.create') }}"><i class="bi bi-pencil me-2"></i>Blog oluştur</a></li>
                            @if(Auth::user()->role == 1)
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}"><i class="bi bi-gear fa-fw me-2"></i>Yönetim paneli</a></li>
                            @endif

                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <li><button class="dropdown-item" type="submit"><i class="bi bi-power fa-fw me-2"></i>Çıkış yap</button></li>
                            </form>
                        </ul>
                    </div>
                @endauth
                @guest()
                    <div class="nav-item d-none d-md-block">
                        <a href="{{ route('login') }}" class="btn btn-sm btn-danger mb-0 mx-2">Giriş yap</a>
                        <a href="{{ route('register') }}" class="btn btn-sm btn-danger mb-0 mx-2">Kayıt ol</a>
                    </div>
                @endguest
            </div>
        </div>
    </nav>
</header>
