@extends('layouts.app')

@section('title', 'Nueva Función')

@section('content')

<div class="card shadow">

    <div class="card-header bg-primary text-white">
        <h4>Nueva Función</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('funciones.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label>Descripción</label>

                <textarea
                    name="descripcion_funcion"
                    class="form-control"
                    rows="4"
                    required>{{ old('descripcion_funcion') }}</textarea>
            </div>

            <div class="mb-3">

                <label>Cargo</label>

                <select name="id_cargo" class="form-control" required>

                    <option value="">Seleccione un cargo</option>

                    @foreach($cargos['data'] as $cargo)

                        <option value="{{ $cargo['id_cargo'] }}">
                            {{ $cargo['nombre_cargo'] }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label>Estado</label>

                <select name="estado" class="form-control">

                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>

                </select>

            </div>

            <button class="btn btn-success">
                Guardar
            </button>

            <a href="{{ route('funciones.index') }}"
                class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>

</div>

@endsection