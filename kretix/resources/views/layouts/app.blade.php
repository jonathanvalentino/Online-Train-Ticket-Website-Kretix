<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ url('images/logo-icon.png') }}" rel="shortcut icon">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kretix</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".preloader").delay(600).fadeOut();
        })
        $(window).on('load', function () {
            $('#no').css('display', 'none');
            $('#no').delay(200).fadeIn(1250);
            $('#fadeinslow').delay(200).css('display', 'none');
            $('#fadeinslow').delay(1500).fadeIn(500);
        });

    </script>
    <style type="text/css">
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #fff;
        }

        .preloader .loading {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font: 14px arial;
        }

    </style>
</head>

<body>
    <div class="preloader">
        <div class="loading">
            <img src="{{ url('images/loading.gif') }}" width="80">
        </div>
    </div>
    <div id="app">
        <nav class="container navbar navbar-expand-lg fixed-top navbar-light bg-white bd-abu border-top-0 rd-b px-4">
            <a class="navbar-brand rounded-pill" href="{{ url('/') }}"><img src="images/logo-icon.png" height="40"
                    alt="" class="d-inline-block align-text-center" /> </a>
            <a class="text-decoration-none" href="{{ url('/') }}"> <span class="fs-4 fw-bold fc-teal">Kretix</span></a>

            <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link px-3 navhv {{ Request::is('home','/') ?  'fc-teal fw-bold' : 'fc-dark'}}"
                        aria-current="page" href="{{ url('/') }}">Beranda</a>
                    <a class="nav-link px-3 navhv {{ Request::is('pencarian','/pencarian','pencariannav') ? 'fc-teal fw-bold' : 'fc-dark' }}"
                        href="{{ url('/pencariannav') }}">Pencarian</a>
                    @if(!empty(Auth::user()->name))
                    @if(Auth::user()->hasRole('admin'))
                    <a class="nav-link px-3 {{ Request::is('dashboard','/dashboard') ? 'fc-teal fw-bold' : 'fc-dark' }}"
                        href="{{ url('dashboard') }}">Dashboard</a>
                    @endif
                    @endif
                    <a class="nav-link px-3 {{ Request::is('tentang','/tentang') ? 'fc-teal fw-bold' : 'fc-dark' }}"
                        href="{{ url('tentang') }}">Tentang</a>
                </div>
            </div>
            @guest
            @if (Route::has('register'))
            <a class="btn btn-outline-kretix" href="{{ url('register') }}">Daftar</a>
            @endif
            @if (Route::has('login'))
            <a class="btn btn-kretix ms-2" href="{{ url('login') }}">Masuk</a>
            @endif
            @endguest

            @if(!empty(Auth::user()->name))
            @if(Auth::user()->hasRole('user'))
            <div class="dropdown">
                <button class="btn btn-kretix dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="{{ url('/profile') }}">Profil</a></li>
                    <li><a class="dropdown-item" href="{{ url('/tiketku') }}">Tiketku</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            @endif
            @if(Auth::user()->hasRole('admin'))
            <div class="dropdown">
                <button class="btn btn-kretix dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="{{ url('/daftartiket') }}">Daftar Tiket</a></li>
                    <li><a class="dropdown-item" href="{{ url('/daftarpemesanan') }}">Daftar Pemesanan</a></li>
                    <li><a class="dropdown-item" href="{{ url('/daftaruser') }}">Daftar Pengguna</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            @endif
            @endif

        </nav>
        @yield('content')
        @include('sweet::alert')
    </div>
</body>
<footer>
    <div class="container">
        <div class="row d-flex py-5 align-items-center">
            <div class="col-md-4">
                @if(!empty(Auth::user()->name))
                @if(Auth::user()->hasRole('admin'))
                @else
                <p>Punya kritik dan saran? Jangan ragu sampaikan ke kami!</p>
                <form method="post" action="{{ url('saran') }}">
                    @csrf
                    <div class="d-flex">
                        <input class="col-8 pl-3 my-2 py-2" type="text" name="message" id="message" required />
                        <input class="btn btn-kretix my-2 ms-2" type="submit" name="send" value="Submit">
                    </div>
                </form>
                @endif
                @endif
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-2">
                <img src="images/logo-dark.png" height="30px" alt="" />
            </div>
            <div class="col-md-1"><img src="images/line-dark.png" height="50px" alt="" /></div>
            <div class="col-md-2">
                <a href="https://chat.whatsapp.com/CVl82XuzhV25E9C8dmQlkR"><img class="my-2" src="images/logo-wa.png"
                        alt="" /></a>
                <a href="https://discord.gg/5FmckKxvHB"><img class="my-2" src="images/logo-ds.png" alt="" /></a>
                <a href="mailto:webkretix@gmail.com"><img class="my-2" src="images/logo-em.png" alt="" /></a>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script src="{{ asset('themes/js/sweetalert.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</html>
