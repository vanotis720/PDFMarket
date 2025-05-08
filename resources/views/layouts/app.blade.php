<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PDFMarket') }}</title>

    <!-- Fonts and Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #FFF6DA;
        }

        .navbar {
            box-shadow: 0 2px 10px rgba(169, 74, 74, 0.1);
            background-color: white !important;
            padding: 12px 0;
        }

        .navbar-brand {
            font-weight: 600;
            font-size: 1.5rem;
            color: #A94A4A !important;
        }

        .text-primary {
            color: #A94A4A !important;
        }

        .bg-primary {
            background-color: #A94A4A !important;
        }

        .btn-primary {
            background-color: #A94A4A;
            border-color: #A94A4A;
            padding: 8px 20px;
            border-radius: 6px;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: #8f3e3e;
            border-color: #8f3e3e;
        }

        .btn-outline-primary {
            color: #A94A4A;
            border-color: #A94A4A;
        }

        .btn-outline-primary:hover {
            background-color: #A94A4A;
            border-color: #A94A4A;
        }

        .btn-success {
            background-color: #889E73;
            border-color: #889E73;
            padding: 8px 20px;
            border-radius: 6px;
            transition: all 0.3s;
        }

        .btn-success:hover {
            background-color: #778a62;
            border-color: #778a62;
        }

        .card {
            border: none;
            box-shadow: 0 5px 20px rgba(169, 74, 74, 0.05);
            transition: all 0.3s ease;
            border-radius: 12px;
            background-color: white;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(169, 74, 74, 0.1);
        }

        .card-header {
            background-color: #F4D793;
            color: #A94A4A;
            font-weight: 500;
        }

        .footer {
            background-color: white;
            padding: 20px 0;
            margin-top: 60px;
            box-shadow: 0 -2px 10px rgba(169, 74, 74, 0.05);
        }

        .badge {
            background-color: #F4D793 !important;
            color: #A94A4A !important;
        }

        .breadcrumb-item.active {
            color: #889E73;
        }

        .breadcrumb-item a {
            color: #A94A4A;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light mb-4">
        <div class="container">
            <a class="navbar-brand text-primary" href="{{ url('/') }}">
                <i class="bi bi-file-earmark-pdf"></i> {{ config('app.name', 'PDFMarket') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item mx-1">
                            <a class="nav-link btn btn-outline-primary rounded-pill px-3" href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-in-right"></i> Connexion
                            </a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link btn btn-primary text-white rounded-pill px-3" href="{{ route('register') }}">
                                <i class="bi bi-person-plus"></i> Inscription
                            </a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=A94A4A&color=fff&rounded=true&size=32"
                                    class="rounded-circle me-2" width="32" height="32"
                                    alt="{{ Auth::user()->name }}">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi bi-person"></i> Mon Profil
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right"></i> Déconnexion
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-4">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container text-center">
            <p class="mb-0">&copy; {{ date('Y') }} {{ config('app.name', 'PDFMarket') }}. Tous droits réservés.
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
