<nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3" style="opacity: 1;">
    <div class="container"
        style="background-color: rgba(255, 255, 255, 0.521); border-radius: 25px; padding-left: 25px; padding-right: 25px;">
        <a class="navbar-brand" style="color: rgb(46, 32, 32); font-size: 40px;" href="{{ url('/ilanliste')}}"><span
                style="color:#8f2121;">O</span>telcim</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" data-toggle="collapse" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars" style="color:rgb(27, 27, 27); font-size:28px;"></i>
        </button>

        <div class="collapse navbar-collapse text-dark" style="color: red;" id="navbarNav">
            <div class=" mx-auto"></div>
            @if(Auth::user())
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/rezervasyonlarım">Rezervasyonlarım</a>
                </li>
            </ul>
            @if(Auth::user()->is_hotel_manager == 1)
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/ilanlarim" style="color: red;">İlanlarım</a>
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
            <li class="nav-item dropdown" style="list-style-type: none;">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-user"> {{Auth::user()->name}}</i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/profilim">Profil Sayfası</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ url('/logout') }}"> Çıkış Yap</a>
                </div>
              </li>
            @endguest
        </div>
</nav>




