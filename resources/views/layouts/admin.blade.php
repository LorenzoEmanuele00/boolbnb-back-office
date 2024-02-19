<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fontawesome 6 cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
        integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">

        <header class="navbar navbar-dark sticky-top flex-md-nowrap p-2 shadow blue-bg">
            <div class="container">
                
                <a class="navbar-brand d-flex align-items-center px-2 m-0" href="{{ url('/') }}">
                    
                    <img src="{{ asset('images/logo_test.png') }}" alt="logo_test" class="logo">
                    <span class="fw-bold text-light">BoolBnB</span>
                    
                </a>                

                <button class="navbar-toggler position-absolute d-md-none collapsed" type="button"
                    data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            
            <div class="navbar-nav">
                <div class="nav-item text-nowrap ms-2">
                    <a class="nav-link text-light" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Esci') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        </header>

        <div class="container-fluid vh-100">
            <div class="row h-100">
                <!-- Definire solo parte del menu di navigazione inizialmente per poi
        aggiungere i link necessari giorno per giorno
        -->
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light navbar-dark sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">

                            <li class="nav-item mb-2">
                                    <a class="nav-link text-light red-bg border rounded-pill" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                        {{ __('Esci') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </li>

                            <li class="nav-item mb-2">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'red-bg border rounded-pill' : '' }}"
                                    href="{{ route('admin.dashboard') }}">
                                    <i class="fa-solid fa-list"></i> DashBoard
                                </a>
                            </li>

                            <li class="nav-item mb-2">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'red-bg border rounded-pill' : '' }}"
                                    href="{{ route('admin.dashboard') }}"> 
                                    {{-- mettere admin index qua sopra --}}
                                    <i class="fa-solid fa-house"></i> I tuoi Appartamenti
                                </a>
                            </li>
                        </ul>


                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    @yield('content')
                </main>
            </div>
        </div>

    </div>
</body>

</html>
