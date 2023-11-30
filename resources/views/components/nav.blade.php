<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">

        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- <h1 class="mb-4 display-1">Legal Mate</h1> -->
        <img src="assets/logoBlanco.png" alt="" class="logoNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/#aboutus">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/pricing">Abogados</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Cuenta
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if(Auth::check())
                        <li><a class="dropdown-item" href="/dashboard">Mi perfil</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a class="dropdown-item text-danger" href="route('logout')" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Cerrar sesión') }}
                                </a>
                            </form>
                        </li>
                        @else
                        <li><a class="dropdown-item" href="/login">Iniciar sesión</a></li>
                        <li><a class="dropdown-item" href="/register">Registrarse</a></li>
                        @endif

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>