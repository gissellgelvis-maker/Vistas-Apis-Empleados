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
                    <th>Fecha de Nacimiento</th>
                    <th>Fecha de ingreso</th>
                    <th>Salario</th>
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

                    <td>{{ $empleado['fecha_nacimiento'] }}</td>

                    <td>{{ $empleado['fecha_ingreso'] }}</td>

                    <td>{{ $empleado['salario'] }}</td>

                    <td>{{ $empleado['cargo']['nombre_cargo'] }}</td>




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

        <div class="paginacion-empleado">

            @if($empleados['prev_page_url'])
            <a href="{{ route('empleados.index', ['page' => $empleados['current_page'] - 1]) }}"
                class="btn-paginacion-empleado btn-anterior-empleado">
                Anterior
            </a>
            @endif

            <span class="texto-paginacion-empleado">
                Página {{ $empleados['current_page'] }}
                de {{ $empleados['last_page'] }}
            </span>

            @if($empleados['next_page_url'])
            <a href="{{ route('empleados.index', ['page' => $empleados['current_page'] + 1]) }}"
                class="btn-paginacion-empleado btn-siguiente-empleado">
                Siguiente
            </a>
            @endif

        </div>
        <div class="contenedor-btn-agregar">
            <a href="{{ route('empleados.create') }}" class="btn-agregar-empleado">
                Nuevo empleado +
            </a>
        </div>


    </div>

    @endsection