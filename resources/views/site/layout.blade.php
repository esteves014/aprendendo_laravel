<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="@yield('css')">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-black">
        <div class="container">
            <a class="navbar-brand text-white" href="{{ route('home') }}">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle text-white" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Categorias
                            </button>
                            <ul class="dropdown-menu">
                                @foreach ($categoriasMenu as $categoriaM)
                                    <li><a class="dropdown-item"
                                            href="{{ route('categoria', $categoriaM->id) }}">{{ $categoriaM->nome }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('cart.index') }}">Carrinho {{ count($cart) }}</a>
                    </li>

                    <li class="nav-item">
                        @auth
                            <div class="dropdown">
                                <button class="btn dropdown-toggle text-white" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Olá, {{ Auth()->user()->name }}

                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('login.logout') }}">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        @else
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login.form') }}">Login</a>
                        </li>
                    @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('conteudo')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
