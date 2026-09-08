<nav class="navbar-rds">
    <div class="container-navbar-rds">

        <a class="marca-navbar-rds" href="{{ route('dashboard') }}">
            Proyecto RDS
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse" id="navbarNav">

            <ul class="lista-navbar-rds">

                <li>
                    <a class="link-navbar-rds {{ request()->routeIs('dashboard') ? 'link-navbar-rds-activo' : '' }}"
                        href="{{ route('dashboard') }}">
                        Inicio
                    </a>
                </li>

                <li>
                    <a class="link-navbar-rds {{ request()->routeIs('empleados.*') ? 'link-navbar-rds-activo' : '' }}"
                        href="{{ route('empleados.index') }}">
                        Empleados
                    </a>
                </li>

                <li>
                    <a class="link-navbar-rds {{ request()->routeIs('cargos.*') ? 'link-navbar-rds-activo' : '' }}"
                        href="{{ route('cargos.index') }}">
                        Cargos
                    </a>
                </li>

                <li>
                    <a class="link-navbar-rds {{ request()->routeIs('funciones.*') ? 'link-navbar-rds-activo' : '' }}"
                        href="{{ route('funciones.index') }}">
                        Funciones
                    </a>
                </li>

            </ul>

            @if(session()->has('user'))

                <div class="usuario-navbar-rds">

                    <span class="nombre-usuario-navbar-rds">
                        {{ session('user.name') }}
                    </span>

                    <form action="{{ route('logout') }}" method="POST">

                        @csrf

                        <button type="submit" class="btn-cerrar-sesion-rds">
                            Cerrar sesión
                        </button>

                    </form>

                </div>

            @endif

        </div>

    </div>
</nav>