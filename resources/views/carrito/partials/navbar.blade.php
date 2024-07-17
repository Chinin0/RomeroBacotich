<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <style>
        .bg-custom {
            background-color: black;
        }

        .contador {
            pointer-events: none;
        }

        .search-container {
            position: relative;
        }

        .search-results {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 1px solid #ccc;
            display: none;
            z-index: 1000;
        }

        .search-results li {
            padding: 10px;
            cursor: pointer;
        }

        .search-results li:hover {
            background: #f0f0f0;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("searchInput");
            const searchResults = document.getElementById("searchResults");
            const searchItems = searchResults.querySelectorAll("li");

            searchInput.addEventListener("focus", function() {
                searchResults.style.display = "block";
            });

            searchInput.addEventListener("blur", function() {
                setTimeout(function() {
                    searchResults.style.display = "none";
                }, 200);
            });

            searchInput.addEventListener("input", function() {
                const filter = searchInput.value.toLowerCase();
                let hasVisibleItems = false;
                searchItems.forEach(function(item) {
                    if (item.textContent.toLowerCase().includes(filter)) {
                        item.style.display = "block";
                        hasVisibleItems = true;
                    } else {
                        item.style.display = "none";
                    }
                });
                searchResults.style.display = hasVisibleItems ? "block" : "none";
            });

            searchItems.forEach(function(item) {
                item.addEventListener("click", function() {
                    searchInput.value = item.textContent;
                    searchResults.style.display = "none";
                });
            });
        });
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-custom shadow-sm">
        <div class="container">
            <div class="navbar-brand">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('img/logonuevo.png') }}" alt="Logo de la Empresa" height="70" width="250">
                </a>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item search-container">
                        <input type="text" id="searchInput" class="form-control" placeholder="Buscar...">
                        <ul id="searchResults" class="list-group search-results">
                            <li class="list-group-item">
                                <a href="{{ route('shop') }}">Tienda</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('reservations.index') }}">Reservas</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('cart.index') }}">Carrito</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('listaPagos') }}">Pagos</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reservations.store') }}">Reservas</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('listaPagos') }}">Pagos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('compras') }}">Compras</a>
                    </li>
                    @if (Auth::check() && (Auth::user()->hasRole('administrador') || Auth::user()->hasRole('personal')))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}"><b>Backoffice</b></a>
                        </li>
                    @endif

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="badge badge-pill badge-dark">
                                <i class="fa fa-shopping-cart"></i>
                                {{ \Cart::session(auth()->id())->getTotalQuantity() }}
                            </span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                            style="width: 450px; padding: 0px; border-color: #9DA0A2">
                            <ul class="list-group" style="margin: 20px;">
                                @include('carrito.partials.cart-drop')
                            </ul>
                        </div>
                    </li>
                    @auth
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ¡Hola, {{ Auth::user()->name }}!
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>
