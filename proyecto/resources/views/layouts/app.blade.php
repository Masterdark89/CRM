<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UI/UX') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-papK4X0n6VQmKqXr4s+e8Z0P4Yv3G3Wc1Kq9x6Y5r9j6Zp9T1k3K6Hq9x1Zq6nQe1Kq3Z5p9V0Y3q6Kq9Z1LQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    
    <style>
        :root{ --pink:#ff6fa6; --pink-dark:#e85692; --pink-light:#ffe6f2; --pink-gradient: linear-gradient(90deg,#ff86b1 0%,#ff6fa6 100%); }

        /* Botones y utilidades rosas */
        .btn-primary{ background:var(--pink); border-color:var(--pink); color:#fff; }
        .btn-primary:hover, .btn-primary:focus{ background:var(--pink-dark); border-color:var(--pink-dark); }
        .btn-pink{ background:var(--pink-gradient); border:0; color:#fff; box-shadow:0 6px 18px rgba(255,111,166,0.14); }
        .btn-pink:hover{ filter:brightness(.95); }
        .btn-outline-pink{ color:var(--pink-dark); border-color:var(--pink); }

        /* Marca y navbar */
        .navbar-brand{ color:var(--pink-dark); font-weight:700; letter-spacing:.2px; }
        .nav-link{ color:#333; }
        .nav-link.active, .nav-link:hover{ color:var(--pink-dark); }

        .rounded-circle.bg-primary{ background-color:var(--pink) !important; }

        .card{ border-radius:.8rem; box-shadow:0 6px 18px rgba(0,0,0,0.04); }
        .card .card-body h4{ color:var(--pink-dark); }

        /* Tabla y filas */
        .table-hover tbody tr:hover{ background-color:var(--pink-light); }

        /* Botones mejorados */
        .btn { font-weight: 500; }
        .btn-sm { padding: 0.5rem 0.75rem !important; font-size: 0.85rem !important; }
        .btn-sm i.fa { font-size: 0.9rem !important; }
        .btn { min-height: 2rem; }
        .btn:hover { transform: translateY(-1px); box-shadow: 0 4px 12px rgba(0,0,0,0.08); }

        /* Botones rosa oscuro */
        .btn-pink-dark { background-color: var(--pink-dark); border-color: var(--pink-dark); color: #fff; }
        .btn-pink-dark:hover { background-color: #d6427f; border-color: #d6427f; color: #fff; }
        .btn-outline-pink-dark { color: var(--pink-dark); border-color: var(--pink-dark); }
        .btn-outline-pink-dark:hover { background-color: var(--pink-dark); border-color: var(--pink-dark); color: #fff; }

        /* Paginación accesible y compacta */
        .pagination{ margin:0 !important; display: flex !important; gap: 0.2rem; align-items: center; flex-wrap: wrap; }
        .pagination.pagination-compact{ margin: 0; gap: 0.2rem; }
        .pagination .page-link{ padding:.3rem .5rem !important; font-size:.7rem !important; color:var(--pink-dark); min-width: auto !important; height: auto !important; display:inline-flex; align-items:center; justify-content:center; border-radius:.25rem; border: 1px solid #ddd; }
        .pagination .page-item{ margin: 0 !important; }
        .pagination .page-item.active .page-link{ background:var(--pink) !important; border-color:var(--pink) !important; color:#fff !important; }
        .pagination .page-item.disabled .page-link{ color:#bfbfbf; pointer-events:none; opacity: 0.5; }
        .pagination .page-link:focus{ outline:2px solid rgba(255,111,166,0.22); outline-offset:1px; }

        /* Pie de tabla compacto */
        .card-footer { padding: .5rem 1rem !important; font-size: .8rem !important; }
        .card-footer .text-muted { font-size: .75rem !important; }

        body{ background-color:#fff; }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'UI/UX') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('clientes.index') }}">Clientes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('productos.index') }}">Productos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('proveedores.index') }}">Proveedores</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('empleados.index') }}">Empleados</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('facturas.index') }}">Facturas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('incidencias.index') }}">Incidencias</a>
                            </li>
                            @role('Admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.roles.index') }}" style="color: var(--pink-dark); font-weight: 600;">
                                    <i class="fa fa-user-shield me-1"></i>Administración
                                </a>
                            </li>
                            @endrole
                        @endauth
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
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    <!-- jQuery (necesario para DataTables) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    
    @stack('scripts')
</body>
</html>
