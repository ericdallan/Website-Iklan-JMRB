<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Website-Iklan-JMRB</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
    <div id="app">
        <nav class="sticky-top navbar navbar-expand-lg navbar-white" style="background-color: #FFFFFF; box-shadow: 0 10px 15px 0 rgba(0,0,0,.3);">
            <div class="container">
                <a class="navbar-brand " href="/"><img src="{{url('Web/logocolor.png')}}" height="30"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link me-3" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-3" href="/About_Us">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-3" href="/Iklan">Iklan</a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item dropdown me-3">
                            <!-- <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> -->
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Login
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('login') }}">Admin</a></li>
                                <li><a class="dropdown-item" href="{{ route('login') }}">Tenant</a></li>
                            </ul>
                        </li>
                        @endif
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div>
            @yield('content')
        </div>
    </div>
</body>
<!-- footer -->
<footer class="text-lg-start text-white pt-5 pb-5" style="background-color:#0A142F">
    <div class="container text-left">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
            <div class="col">
                <img src="{{url('Web/logowhite.png')}}">
            </div>
            <div class="col">
                <div class="row">
                    <p>Contact Us</p>
                </div>
                <div class="row">
                    <p>Gedung Jagorawi Lantai 2, Plaza Tol Taman Mini Indonesia Indah, RT.8/RW.2, Dukuh, Kec. Kramat jati, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13550</p>
                </div>
                <div class="row" style="color: #FECD0A;">
                    <i class="bi bi-telephone-fill"> (021) 22093560</i>
                </div>
                <div class="row" style="color: #FECD0A;">
                    <i class="bi bi-envelope-fill"> relatedbusiness@jmrb.co.id</i>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <p>About Us</p>
                </div>
                <div class="row">
                    <a class="text-white" href="/About_Us" style="text-decoration:none;">Profil Perusahaan</a></li>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <p>Social</p>
                </div>
                <div class="row">
                    <div class="col" style="color: #FECD0A;">
                        <i class="bi bi-facebook p-2"></i>
                        <i class="bi bi-instagram p-2"></i>
                        <i class="bi bi-twitter p-2"></i>
                        <i class="bi bi-youtube p-2"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pb-3 pt-5">
            <hr style="width:100%" , size="3" , color=FFFFFF>
        </div>
        <div class="row text-center opacity-50">
            <p>© 2022 Jasa Marga Related Businesss | All Rights Reserved</p>
        </div>
    </div>
</footer>
<!-- footer -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</html>