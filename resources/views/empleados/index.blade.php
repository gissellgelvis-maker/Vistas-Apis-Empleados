@extends('layouts.app')

@section('title', 'Empleados')

@section('content')

<div class="card shadow">

    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Listado de Empleados</h4>
    </div>

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h5 class="mb-0">Empleados registrados</h5>

            <a href="{{ route('empleados.create') }}" class="btn btn-primary">
                Nuevo empleado +
            </a>

        </div>

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

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

                    <td>{{ ucfirst($empleado['estado']) }}</td>

                    <td>
                        <a href="{{ route('empleados.edit', $empleado['id_empleado']) }}"
                            class="btn btn-warning btn-sm">
                            Editar
                        </a>
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection