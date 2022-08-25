<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Website-Iklan-JMRB</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<style>
    .navbar-sticky-top {
        position: fixed;
        z-index: 999;
        opacity: 1;
        width: 100%;
    }

    .reveal {
        position: relative;
        transform: translateY(150px);
        opacity: 0;
        transition: 1s all ease;
    }

    .reveal.active {
        transform: translateY(0);
        opacity: 1;
    }

    .active.fade-left {
        animation: fade-left 1s ease-in;
    }

    .active.fade-right {
        animation: fade-right 1s ease-in;
    }

    @keyframes fade-left {
        0% {
            transform: translateX(-100px);
            opacity: 0;
        }

        100% {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes fade-right {
        0% {
            transform: translateX(100px);
            opacity: 0;
        }

        100% {
            transform: translateX(0);
            opacity: 1;
        }
    }
</style>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-white navbar-sticky-top" style="background-color: #FFFFFF; box-shadow: 0 10px 15px 0 rgba(0,0,0,.3);">
            <div class="container">
                <a class="navbar-brand " href="/"><img src="{{url('Web/logocolor.png')}}" height="30"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    @guest
                    <div class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link me-3" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-3" href="/about_us">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-3" href="/iklan">Iklan</a>
                        </li>
                        <li class="nav-item dropdown me-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Login</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('login/admin') }}">Admin</a></li>
                                <li><a class="dropdown-item" href="{{ route('login') }}">Tenant</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    </div>
                    @else
                    <div class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link me-3" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-3" href="/about_us">About Us</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle me-3"" href=" #" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Iklan
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('user/iklan')}}">Iklan</a></li>
                                <li><a class="dropdown-item" href="#">MyIklan</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-3" href="{{route('user/negotiation')}}">Negotiation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-3" href="{{route('user/chatroom')}}">Chat Room</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle me-3"" href=" #" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Pembayaran
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Pembayaran</a></li>
                                <li><a class="dropdown-item" href="#">MyPembayaran</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @if(Auth::guard('web')->user()->first_name != '')
                                {{ Auth::user()->first_name }}
                                @endif
                                @if(Auth::guard('web')->user()->first_name == '')
                                {{ Auth::user()->username }}
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('user/profile',['id'=>auth()->user()->id_user]) }}">Profil</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>
        <div class="pt-5">
            @yield('content')
        </div>
    </div>
</body>
<!-- footer -->
<footer class="text-lg-start text-white py-5" style="background-color:#0A142F">
    <div class="container text-left">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
            <div class="col justify-content-center align-items-center">
                <img src="{{url('Web/logowhite.png')}}">
            </div>
            <div class="col">
                <div class="row mb-3">
                    <p>Contact Us</p>
                </div>
                <div class="row mb-3">
                    <p>Gedung Jagorawi Lantai 2, Plaza Tol Taman Mini Indonesia Indah, RT.8/RW.2, Dukuh, Kec. Kramat jati, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13550</p>
                </div>
                <div class="row mb-3" style="color: #FECD0A;">
                    <i class="bi bi-telephone-fill"> (021) 22093560</i>
                </div>
                <div class="row mb-2" style="color: #FECD0A;">
                    <i class="bi bi-envelope-fill"> relatedbusiness@jmrb.co.id</i>
                </div>
            </div>
            <div class="col">
                <div class="row mb-3">
                    <p>About Us</p>
                </div>
                <div class="row mb-3">
                    <a class="text-white" href="/about_us" style="text-decoration:none;">Profil Perusahaan</a></li>
                </div>
            </div>
            <div class="col">
                <div class="row mb-3">
                    <p>Social</p>
                </div>
                <div class="row mb-3">
                    <div class="col" style="color: #FECD0A;">
                        <i class="bi bi-facebook p-2"></i>
                        <i class="bi bi-instagram p-2"></i>
                        <i class="bi bi-twitter p-2"></i>
                        <i class="bi bi-youtube p-2"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-3">
            <hr style="width:100%" , size="3" , color=FFFFFF>
        </div>
        <div class="row text-center opacity-50">
            <p>© 2022 Jasa Marga Related Businesss | All Rights Reserved</p>
        </div>
    </div>
</footer>
<!-- footer -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<!-- script javascript -->
<script>
    function reveal() {
        var reveals = document.querySelectorAll(".reveal");

        for (var i = 0; i < reveals.length; i++) {
            var windowHeight = window.innerHeight;
            var elementTop = reveals[i].getBoundingClientRect().top;
            var elementVisible = 150;

            if (elementTop < windowHeight - elementVisible) {
                reveals[i].classList.add("active");
            } else {
                reveals[i].classList.remove("active");
            }
        }
    }

    window.addEventListener("scroll", reveal);
</script>
<script src="float-panel.js"></script>

</html>