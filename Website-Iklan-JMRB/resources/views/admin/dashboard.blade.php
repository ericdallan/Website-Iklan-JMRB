<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Website-Iklan-JMRB - @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0" style="background-color:#0A142F;">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100">
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start mt-2" id="menu">
                        <li class="nav-item mb-2" class="nav-link text-white align-middle px-0">
                            <a href="/dashboard" class="d-flex justify-content-center py-3">
                                <img src="{{url('Web/logowhite.png')}}" class="img-fluid logo">
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="{{route('dashboard')}}" class="nav-link text-white align-middle px-0">
                                <i class="fs-6 bi bi-pie-chart"></i><span class="ms-1 d-none d-sm-inline">Overview</span>
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="{{route('dashboard/iklan')}}" class="nav-link text-white align-middle px-0">
                                <i class="fs-6 bi bi-badge-ad-fill"></i> <span class="ms-1 d-none d-sm-inline">Advertisement</span>
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="{{route('admin/negotiation')}}" class="nav-link text-white align-middle px-0">
                                <i class="fs-6 bi bi-briefcase"></i> <span class="ms-1 d-none d-sm-inline">Negosiasi</span>
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="#" class="nav-link text-white align-middle px-0">
                                <i class="fs-6 bi bi-credit-card-fill"></i> <span class="ms-1 d-none d-sm-inline">Payment</span>
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="{{route('admin/chatroom')}}" class="nav-link text-white align-middle px-0">
                                <i class="fs-6 bi bi-chat-square-text-fill"></i> <span class="ms-1 d-none d-sm-inline">Chat Room</span>
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="{{route('dashboard/user')}}" class="nav-link text-white align-middle px-0">
                                <i class="fs-6 bi bi-people"></i> <span class="ms-1 d-none d-sm-inline">User</span>
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="{{route('dashboard/admin')}}" class="nav-link text-white align-middle px-0">
                                <i class="fs-6 bi bi-person-badge-fill"></i> <span class="ms-1 d-none d-sm-inline">Admin</span>
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="#" class="nav-link text-white align-middle px-0">
                                <i class="fs-6 bi bi-bar-chart-line-fill"></i> <span class="ms-1 d-none d-sm-inline">Chart</span>
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="#" class="nav-link text-white align-middle px-0">
                                <i class="fs-6 bi bi-table"></i> <span class="ms-1 d-none d-sm-inline">Table</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col" style="background-color:white;">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <a class="navbar-brand text-dark fw-bold" href="#">@yield('subtitle')</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarText">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            </ul>
                            <div class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span class="d-none d-sm-inline mx-1">
                                        @if(Auth::guard('admin')->user()->first_name != '')
                                        {{ Auth::user()->first_name }}
                                        @endif
                                        @if(Auth::guard('admin')->user()->first_name == '')
                                        {{ Auth::user()->username }}
                                        @endif
                                    </span>
                                    @if(Auth::guard('admin')->user()->pic_profile == '')
                                    <img src="{{url('Web/default-user.png')}}" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                    @endif
                                    @if(Auth::guard('admin')->user()->pic_profile != '')
                                    <img src="/Foto_Profile/Admin/{{Auth::guard('admin')->user()->pic_profile}}" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin/profile',['id'=>auth()->user()->id_admin]) }}">Profil</a>
                                    <a class="dropdown-item" href="{{ route('logoutadmin') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logoutadmin') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </nav>
                <div class="py-3">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <div type="button" class="btn-close rounded-4" data-bs-dismiss="alert" aria-label="Close"></div>
                    </div>
                    @endif
                    @if (session('failed'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('failed') }}
                        <div type="button" class="btn-close rounded-4" data-bs-dismiss="alert" aria-label="Close"></div>
                    </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>

</html>