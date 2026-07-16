@extends('layouts.app')

@section('title', 'Empleados')

@section('content')

<div class="Cuadro_de_fondo_dela_tabla">

    <div class="encabezado_de_empleados_registrados">
        <h4 class="Texto-Listado_empleado">Listado de Empleados Registrados</h4>
    </div>

    <div class="Tabla_empleados">

        <div class="d-flex justify-content-between align-items-center mb-3">

        </div>

        <table class="table table-bordered table-hover">

            <thead class="encabezado-tabla-empleados">

                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Cargo</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody>

                @foreach($empleados['data'] as $empleado)

                <tr>

                    <td>{{ $empleado['id_empleado'] }}</td>

                    <td>{{ $empleado['nombres'] }}</td>

                    <td>{{ $empleado['apellidos'] }}</td>

                    <td>{{ $empleado['cargo']['nombre_cargo'] }}</td>

                    <!-- <td>{{ ucfirst($empleado['estado']) }}</td> -->


                    @if ($empleado['estado'] =="inactivo")
                    <td class="estado-inactivo">Inactivo</td>
                    @else
                    <td class="estado-activo">Activo</td>
                    @endif


                    <td class="acciones">
                        <a href="{{ route('empleados.edit', $empleado['id_empleado']) }}"
                            class="btn-editar-empleado">
                            Editar
                        </a>

                        <form action="{{ route('empleados.destroy', $empleado['id_empleado']) }}"
                            method="POST"
                            class="caja-de-btn-editar-eliminar"
                            onsubmit="return confirm('¿Confirma eliminar el empleado?');">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn-eliminar-empleado">
                                <p> Eliminar</p>
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

                {{-- Anterior --}}
                <li class="page-item {{ $empleados['current_page'] == 1 ? 'disabled' : '' }}">
                    <a class="page-link"
                        href="{{ route('empleados.index', ['page' => $empleados['current_page'] - 1]) }}">
                        Anterior
                    </a>
                </li>

                {{-- Números de página --}}
                @for($i = 1; $i <= $empleados['last_page']; $i++)

                    <li class="page-item {{ $i == $empleados['current_page'] ? 'active' : '' }}">

                    <a class="page-link"
                        href="{{ route('empleados.index', ['page' => $i]) }}">
                        {{ $i }}
                    </a>

                    </li>

                    @endfor

                    {{-- Siguiente --}}
                    <li class="page-item {{ $empleados['current_page'] == $empleados['last_page'] ? 'disabled' : '' }}">
                        <a class="page-link"
                            href="{{ route('empleados.index', ['page' => $empleados['current_page'] + 1]) }}">
                            Siguiente
                        </a>
                    </li>

            </ul>

        </nav>

    </div>
    <div class="contenedor-btn-agregar">
        <a href="{{ route('empleados.create') }}" class="btn-agregar-empleado">
            Nuevo empleado +
        </a>
    </div>


</div>

@endsection