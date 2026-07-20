@extends('layouts.app')

@section('title', 'Cargos')

@section('content')

<div class="Cuadro_de_fondo_dela_tabla_cargos">

    <div class="encabezado_de_cargos">
        <h4 class="Texto-Listado_cargos">Listado de Cargos Registrados</h4>
    </div>

    <div class="Tabla_cargos">

        <table class="table table-bordered table-hover">

            <thead class="encabezado-tabla-cargos">

                <tr>
                    <th>ID</th>
                    <th>Nombre del cargo</th>
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

                    <td class="acciones-cargos">

                        <a href="{{ route('cargos.edit', $cargo['id_cargo']) }}" class="btn-editar-cargo">
                            Editar
                        </a>

                        <form action="{{ route('cargos.destroy', $cargo['id_cargo']) }}"
                            method="POST"
                            class="caja-de-btn-editar-eliminar-cargo"
                            onsubmit="return confirm('¿Confirma eliminar el cargo?');">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn-eliminar-cargo">
                                Eliminar
                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    <div class="paginacion-cargos">

        @if($cargos['prev_page_url'])
        <a href="{{ route('cargos.index', ['page' => $cargos['current_page'] - 1]) }}"
            class="btn-paginacion-cargo">
            Anterior
        </a>
        @endif

        <span class="texto-paginacion-cargo">
            Página {{ $cargos['current_page'] }}
            de {{ $cargos['last_page'] }}
        </span>

        @if($cargos['next_page_url'])
        <a href="{{ route('cargos.index', ['page' => $cargos['current_page'] + 1]) }}"
            class="btn-paginacion-cargo">
            Siguiente
        </a>
        @endif

    </div>

    <div class="contenedor-btn-agregar-cargo">

        <a href="{{ route('cargos.create') }}" class="btn-agregar-cargo">
            Nuevo cargo +
        </a>

    </div>

</div>

@endsection