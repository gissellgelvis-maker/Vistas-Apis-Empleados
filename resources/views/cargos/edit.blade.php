@extends('layouts.app')

@section('title', 'Editar Cargo')

@section('content')

<div class="card shadow">

    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Editar Cargo</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('cargos.update', $cargo['id_cargo']) }}" method="POST">

            @csrf 
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nombre del cargo</label>

                <input
                    type="text"
                    name="nombre_cargo"
                    class="form-control"
                    value="{{ old('nombre_cargo', $cargo['nombre_cargo']) }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>

                <textarea
                    name="descripcion"
                    class="form-control"
                    rows="4"
                    required>{{ old('descripcion', $cargo['descripcion']) }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">
                Guardar
            </button>

            <a href="{{ route('cargos.index') }}" class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>

</div>

@endsection