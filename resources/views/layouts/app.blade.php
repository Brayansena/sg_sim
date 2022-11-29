<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" rel="stylesheet"></script>
    {{-- <script src="{{ asset('sass/app.scss') }}" rel="stylesheet"></script> --}}


    <!-- Fonts -->


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app2.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    {{-- <script type="text/javascript" src="js/jquery.js"></script> --}}
</head>
<body>
    @if(@Auth::user()->hasRole('admin'))
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/">SG SIMS</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="/simcards-asignadas">Simcard Activas</a></li>
                        <li class="nav-item"><a class="nav-link" href="/estado">Reasignar</a></li>
                        <li class="nav-item"><a class="nav-link" href="/asignar/bodega">Asignar a Bodega</a></li>
                        <li class="nav-item"><a class="nav-link" href="/simcards">Simcards</a></li>
                        <li class="nav-item"><a class="nav-link" href="/punto-ventas">Puntos de Venta</a></li>
                        <li class="nav-item"><a class="nav-link" href="/redes">Redes</a></li>
                        <li class="nav-item"><a class="nav-link" href="/consumos">Consumos</a></li>
                        <li class="nav-item"><a class="nav-link" href="/users">Usuarios</a></li>
                    </ul>
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
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesion') }}
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
            @yield('content')
        </main>
    </div>
        @endif
        @if(@Auth::user()->hasRole('inventario'))
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/">SG SIMS</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="/dispositivos">Dispositivo</a></li>
                        <li class="nav-item"><a class="nav-link" href="/dispositivo/estado">Estado</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('simcards.consulta') }}">Consultar Simcards</a></li>
                        <li class="nav-item"><a class="nav-link" href="/punto-ventas">Puntos de Venta</a></li>
                    </ul>
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
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesion') }}
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
            @yield('content')
        </main>
    </div>
        @endif
        @if(@Auth::user()->hasRole('bodega'))
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="">
                <div class="container px-4 px-lg-5">
                    <a class="navbar-brand" href="">SG SIMS</a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        Menu
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link" href="/estado">Reasignar Simcard</a></li>
                            <li class="nav-item"><a class="nav-link" href="/bodegas">Asignar Simcard</a></li>
                            <li class="nav-item"><a class="nav-link" href="/dispositivos">Dispositivo</a></li>
                        <li class="nav-item"><a class="nav-link" href="/dispositivo/estado">Estado</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('simcards.consulta') }}">Consultar Simcards</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('punto-ventas.consulta') }}">Consultar Punto Venta</a></li>
                        </ul>
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
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Cerrar Sesion') }}
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
                @yield('content')
            </main>
        </div>
            @endif
            @if(@Auth::user()->hasRole('tecnico'))
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="">
                    <div class="container px-4 px-lg-5">
                        <a class="navbar-brand" href="/">SG SIMS</a>
                        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                            Menu
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item"><a class="nav-link" href="/simcards-asignadas">Asignar Simcard</a></li>
                                <li class="nav-item"><a class="nav-link" href="/intercambio">Intercambio Simcard</a></li>
                                <li class="nav-item"><a class="nav-link" href="/dispositivo/intercambioindex">Activo</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('simcards.consulta') }}">Consultar Simcards</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('dispositivos.consulta') }}">Consultar Activos</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('punto-ventas.consulta') }}">Consultar Punto Venta</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('redes.consulta') }}">Consultar Red</a></li>

                            </ul>
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
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Cerrar Sesion') }}
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
                    @yield('content')
                </main>
            </div>
                @endif
</body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $('.eliminar').submit(function(e){

            e.preventDefault();
            Swal.fire({
            title: 'Estas Seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si "Eliminar"',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
            })

        })

</script>

</html>
