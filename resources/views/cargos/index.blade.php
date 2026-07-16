@extends('layouts.app')

@section('title', 'Cargos')

@section('content')

<div class="Cuadro_de_fondo_dela_tabla">

    <div class="encabezado_de_empleados_registrados">
        <h4 class="Texto-Listado_empleado">Listado de Cargos</h4>
    </div>

    <div class="Tabla_empleados">

        <table class="table table-bordered table-hover">

            <thead class="encabezado-tabla-empleados">

                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody>

                @foreach($cargos['data'] as $cargo)

                <tr>

                    <td>{{ $cargo['id_cargo'] }}</td>

                    <td>{{ $cargo['nombre_cargo'] }}</td>

                    <td>{{ $cargo['descripcion'] }}</td>

                    <td class="acciones">

                        <a href="{{ route('cargos.edit', $cargo['id_cargo']) }}" class="btn-editar-empleado">
                            Editar
                        </a>

                        <form action="{{ route('cargos.destroy', $cargo['id_cargo']) }}"
                            method="POST"
                            class="caja-de-btn-editar-eliminar"
                            onsubmit="return confirm('¿Confirma eliminar el cargo?');">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn-eliminar-empleado">
                                Eliminar
                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    <div class="d-flex justify-content-center mt-4">

        <nav>

            <ul class="pagination">

                {{-- Botón Anterior --}}
                <li class="page-item {{ $cargos['current_page'] == 1 ? 'disabled' : '' }}">
                    <a class="page-link"
                        href="{{ route('cargos.index', ['page' => $cargos['current_page'] - 1]) }}">
                        Anterior
                    </a>
                </li>

                {{-- Números de página --}}
                @for($i = 1; $i <= $cargos['last_page']; $i++)

                    <li class="page-item {{ $i == $cargos['current_page'] ? 'active' : '' }}">

                    <a class="page-link"
                        href="{{ route('cargos.index', ['page' => $i]) }}">
                        {{ $i }}
                    </a>

                    </li>

                    @endfor

                    {{-- Botón Siguiente --}}
                    <li class="page-item {{ $cargos['current_page'] == $cargos['last_page'] ? 'disabled' : '' }}">
                        <a class="page-link"
                            href="{{ route('cargos.index', ['page' => $cargos['current_page'] + 1]) }}">
                            Siguiente
                        </a>
                    </li>

            </ul>

        </nav>

    </div>

    <div class="contenedor-btn-agregar">

        <a href="{{ route('cargos.create') }}" class="btn-agregar-empleado">
            Nuevo cargo +
        </a>

    </div>

</div>

@endsection