<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/admin">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.users.index') }}">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link desarrollando" aria-current="page" href="{{ route('admin.solicitudesProceso') }}">Solicitudes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link desarrollando" aria-current="page" href="{{ route('admin.solicitudesProceso') }}">Categorias</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a class="nav-link text-danger" href="route('logout')" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    function desarrollando(desevent){
        event.preventDefault();
        alert('caracteristica en desarrollo para la tesis')
    }
    document.querySelectorAll('.desarrollando').forEach(element => {
        element.addEventListener('click', desarrollando)        
    });
</script>