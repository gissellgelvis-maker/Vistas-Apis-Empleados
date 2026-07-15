<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="{{ route('dashboard') }}">
            Proyecto RDS
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse" id="navbarNav">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        Inicio
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('empleados.index') }}">
                        Empleados
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cargos.index') }}">
                        Cargos
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Funciones
                    </a>
                </li>

            </ul>

            @if(session()->has('user'))

                <span class="navbar-text text-white me-3">
                    {{ session('user.name') }}
                </span>

                <form action="{{ route('logout') }}" method="POST">

                    @csrf

                    <button type="submit" class="btn btn-danger btn-sm">
                        Cerrar sesión
                    </button>

                </form>

            @endif

        </div>

    </div>
</nav>