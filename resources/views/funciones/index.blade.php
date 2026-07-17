@extends('layouts.app')

@section('title', 'Funciones')

@section('content')

<div class="Cuadro_de_fondo_dela_tabla_funciones">

    <div class="encabezado_de_funciones">
        <h4 class="Texto-Listado_funciones">
            Listado de Funciones
        </h4>
    </div>

    <div class="Tabla_funciones">

        <table class="table table-bordered table-hover">

            <thead class="encabezado-tabla-funciones">

                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Cargo</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody>

                @foreach($funciones['data'] as $funcion)

                <tr>

                    <td>{{ $funcion['id_funcion'] }}</td>

                    <td>{{ $funcion['descripcion_funcion'] }}</td>

                    <td>{{ ucfirst($funcion['estado']) }}</td>

                    <td>{{ $funcion['cargo']['nombre_cargo'] }}</td>

                    <td class="acciones-funciones">

                        <a href="{{ route('funciones.edit', $funcion['id_funcion']) }}" class="btn-editar-funcion">
                            Editar
                        </a>

                        <form action="{{ route('funciones.destroy', $funcion['id_funcion']) }}"
                            method="POST"
                            onsubmit="return confirm('¿Confirma eliminar esta función?');">

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

    <div class="contenedor-btn-agregar-funcion">

        <a href="{{ route('funciones.create') }}" class="btn-agregar-funcion">
            Nueva función +
        </a>

    </div>

</div>

@endsection