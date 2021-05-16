<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" href="/css/bulma.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Wallaclone</title>
</head>
<body>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ route('home') }}">WallaClone</a>

            <a id="navburger" role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navmenu">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navmenu" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="/">
                    Home
                </a>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        Más
                    </a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="/?cat=Hogar">Hogar</a>
                        <a class="navbar-item" href="/?cat=Electrónica">Electrónica</a>
                        <a class="navbar-item" href="/?cat=Motor">Motor</a>
                        <hr class="navbar-divider">
                        <a class="navbar-item">Extra</a>
                    </div>
                </div>
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    @auth
                        <div class="buttons">
                            <a class="button is-light" href="{{ url('/dashboard') }}">Dashboard</a>
                            <a class="button is-light" href="{{ route('private') }}">
                                Area Privada
                            </a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="button is-primary">
                                    <strong>Logout</strong>
                                </button>
                            </form>
                        </div>
                    @else
                        <div class="buttons">
                            <a class="button is-primary" href="{{ route('register') }}">
                                <strong>Registro</strong>
                            </a>
                            <a class="button is-light" href="{{ route('login') }}">
                                Login
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
    <footer class="footer">
        <div class="container">
            <div class="content has-text-centered">
                <p>
                    <strong>Práctica DAW2 M7 Laravel</strong> por Daniel Domínguez
                </p>
            </div>
        </div>
    </footer>
    <script src="/js/core.js"></script>
</body>
</html>
