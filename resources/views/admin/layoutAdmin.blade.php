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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .py {
            width: 90%;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm  sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    PorAhiNo
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}">
                                <i class="bi bi-house button">Inicio</i>
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
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
                                    Cerrar sesión
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

        <main class="py-4">
            <div class="container main-container">
                <div class="row flex-nowrap">
                    <div class="sidebar col-auto col-xl-2" id="sidebar">
                        <div class="border-end bg-white" id="sidebar-wrapper">
                            <div class="sidebar-heading border-bottom bg-light">Administracion</div>
                            <div class="list-group list-group-flush">
                                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Dashboard</a>
                                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('publicaciones.reportados')}}">Publicaciones Reportadas</a>
                                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Usuarios</a>
                                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Departamentos</a>
                                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Provincias</a>
                                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Distritos</a>
                                <!-- <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Overview</a>
                                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Events</a>
                                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Profile</a>
                                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Status</a> -->
                            </div>
                        </div>
                    </div>
                    @yield('contentAdmin')
                </div>
            </div>
        </main>
    </div>
</body>

</html>