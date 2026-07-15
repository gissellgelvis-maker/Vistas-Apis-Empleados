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

                        <a href="#" class="btn-editar-empleado">
                            Editar
                        </a>

                        <button class="btn-eliminar-empleado">
                            Eliminar
                        </button>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    <div class="contenedor-btn-agregar">

        <a href="{{ route('cargos.create') }}" class="btn-agregar-empleado">
            Nuevo cargo +
        </a>

    </div>

</div>

@endsection