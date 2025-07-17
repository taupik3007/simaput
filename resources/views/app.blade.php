<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('template-assets/vendor/aos/aos.js')}}"></script>
    <script src="{{ asset('template-assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{ asset('template-assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('template-assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{ asset('template-assets/vendor/purecounter/purecounter.js')}}"></script>
    <script src="{{ asset('template-assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{ asset('template-assets/js/main.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="{{asset('js/search.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    {{-- Template CORE CSS --}}
    <link rel="stylesheet" href="{{ asset('template-assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('template-assets/css/costum.css')}}">
    <link rel="stylesheet" href="{{ asset('template-assets/vendor/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('template-assets/vendor/boxicons/css/boxicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('template-assets/vendor/glightbox/css/glightbox.min.css')}}">
    <link rel="stylesheet" href="{{ asset('template-assets/vendor/remixicon/remixicon.css')}}">
    <link rel="stylesheet" href="{{ asset('template-assets/vendor/swiper/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{ asset('template-assets/vendor/aos/aos.css')}}">

</head>
<body>
    <div id="app">
        <header id="header" class="fixed-top">
           <div class="container d-flex align-items-center justify-content-between">
                <h1 class="logo" style="font-size: 1vh; font-size:1vw;"><a href="/">SMKS MAHAPUTRA CERDAS UTAMA</a></h1>
                <nav id="navbar" class="navbar" style="height: 43px;">
                    <ul>
                    <li><a class="nav-link scrollto active" href="/">Beranda</a></li>
                    <li class="dropdown"><a href="#jurusan"><span>Jurusan</span><i class="bi bi-chevron-down"></i></a>
                        <ul>
                        <li><a href="#multimedia">Multimedia</a></li>
                        <li><a href="#rpl">Rekayasa Perangkat Lunak</a></li>
                        </ul>
                    <li class="dropdown"><a href="#about"><span>Profil</span><i class="bi bi-chevron-down"></i></a>
                        <ul>
                        <li><a href="#about">Sekolah</a></li>
                        <li><a href="#guru">Manajemen</a></li>
                        </ul>
                    <li><a class="nav-link scrollto" href="#services">Ekstrakurikuler</a></li>
                    {{-- <li><a class="nav-link scrollto" href="#galeri">Galeri</a></li> --}}
                    {{-- <li><a class="nav-link scrollto" href="/news/">Berita</a></li> --}}
                    <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
                    <li><a class="getstarted scrollto" href="/login">Login</a></li>
                    <li><a class="getstarted scrollto" href="/register-student">Register</a></li>

                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav>
            </div>
        </header>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
