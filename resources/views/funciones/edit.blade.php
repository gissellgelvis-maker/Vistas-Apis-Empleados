@extends('layouts.app')

@section('title', 'Nueva Función')

@section('content')

<div class="card shadow">

    <div class="card-header bg-primary text-white">
        <h4>Nueva Función</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('funciones.update', $funcion['id_funcion']) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Descripción</label>

                <textarea
                    name="descripcion_funcion"
                    class="form-control"
                    rows="4"
                    required>{{ old('descripcion_funcion', $funcion['descripcion_funcion']) }}</textarea>
            </div>

            <div class="mb-3">

                <label>Cargo</label>

                <select name="id_cargo" class="form-control" required>

                    @foreach($cargos['data'] as $cargo)

                    <option
                        value="{{ $cargo['id_cargo'] }}"
                        {{ $cargo['id_cargo'] == $funcion['id_cargo'] ? 'selected' : '' }}>

                        {{ $cargo['nombre_cargo'] }}

                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label>Estado</label>
                <select name="estado" class="form-control">

                    <option value="activo"
                        {{ $funcion['estado'] == 'activo' ? 'selected' : '' }}>
                        Activo
                    </option>

                    <option value="inactivo"
                        {{ $funcion['estado'] == 'inactivo' ? 'selected' : '' }}>
                        Inactivo
                    </option>

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