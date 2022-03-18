<nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3" style="opacity: 1;">
    <div class="container"
        style="background-color: rgba(255, 255, 255, 0.521); border-radius: 25px; padding-left: 25px; padding-right: 25px;">
        <a class="navbar-brand" style="color: rgb(46, 32, 32); font-size: 40px;" href="{{ url('/')}}"><span
                style="color:#cf3232;">O</span>telcim</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" data-toggle="collapse" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars" style="color:rgb(27, 27, 27); font-size:28px;"></i>
        </button>

        <div class="collapse navbar-collapse text-dark" style="color: red;" id="navbarNav">
            <div class=" mx-auto"></div>
            @if(Auth::user())
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/messages">mesajlarım</a>
                </li>
            </ul>
            @if(Auth::user()->is_ev_sahibi == 1)
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('home') }}" style="color: red;">İlanlarım</a>
                </li>
            </ul>
            @endif
            @endif
            @guest
            @if (Route::has('login'))
            <li class=" navbar-nav">
                <a class="nav-link text-dark" href="{{ route('login') }}">Giriş Yap</a>
            </li>
            @endif

            @if (Route::has('register'))
            <li class="navbar-nav">
                <a class="nav-link text-dark" href="{{ route('register') }}">Kayıt Ol</a>
            </li>
            @endif
            @else
            <div class="dropdown navbar-nav">
                <a style="color: rgb(255, 0, 0);" id="navbarDropdown" class="nav-link " href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                        Çıkış yap
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            @endguest
        </div>
</nav>




