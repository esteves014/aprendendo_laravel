<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-danger navbar-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#slide-out"
                aria-controls="slide-out">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand mx-auto" href="index.html"><img src="{{ asset('img/logo.png') }}" alt="Logo"></a>

            <div class="d-flex">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item d-none d-md-block">
                        <a href="#" class="nav-link text-white" onclick="fullScreen()"><i
                                class="bi bi-arrows-fullscreen"></i></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Olá usuário!
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Dashboard</a></li>
                            <li><a class="dropdown-item" href="#">Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="slide-out" aria-labelledby="offcanvasLabel">
        <div class="offcanvas-header">
            <div class="user-view">
                <div class="background bg-danger">
                    <img src="{{ asset('img/office.jpg') }}"
                        style="opacity: 0.5; width: 100%; height: 100%; object-fit: cover;">
                </div>
                <a href="#user"><img class="circle" src="{{ asset('img/user.jpg') }}"></a>
                <a href="#name"><span class="white-text name">John Doe</span></a>
                <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
            </div>
        </div>
        <div class="offcanvas-body">
            <ul class="list-unstyled">
                <li><a class="text-decoration-none" href="#!"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
                </li>
                <li><a class="text-decoration-none" href="#"><i class="bi bi-box-seam me-2"></i>Produtos</a>
                </li>
                <li><a class="text-decoration-none" href="#!"><i class="bi bi-cart me-2"></i>Pedidos</a></li>
                <li><a class="text-decoration-none" href="#!"><i class="bi bi-bookmark me-2"></i>Categorias</a>
                </li>
                <li><a class="text-decoration-none" href="#!"><i class="bi bi-people me-2"></i>Usuários</a>
                </li>
            </ul>
        </div>
    </div>
    @yield('conteudo')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/chart.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @stack('graficos')
</body>

</html>
