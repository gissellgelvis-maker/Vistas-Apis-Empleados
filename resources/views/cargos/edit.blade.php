@extends('layouts.app')

@section('title', 'Editar Cargo')

@section('content')

<div class="card-form-cargo shadow">

    <div class="encabezado-form-cargo">
        <h4 class="titulo-form-cargo mb-0">Editar Cargo</h4>
    </div>

    <div class="cuerpo-form-cargo">

        <form action="{{ route('cargos.update', $cargo['id_cargo']) }}" method="POST">

            @csrf 
            @method('PUT')

            <div class="mb-3">
                <label class="form-label-cargo">Nombre del cargo</label>

                <input
                    type="text"
                    name="nombre_cargo"
                    class="input-form-cargo"
                    value="{{ old('nombre_cargo', $cargo['nombre_cargo']) }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label-cargo">Descripción</label>

                <textarea
                    name="descripcion"
                    class="input-form-cargo"
                    rows="4"
                    required>{{ old('descripcion', $cargo['descripcion']) }}</textarea>
            </div>

            <div class="botones-form-cargo">
                <button type="submit" class="btn-guardar-cargo">
                    Guardar
                </button>

                <a href="{{ route('cargos.index') }}" class="btn-cancelar-cargo">
                    Cancelar
                </a>
            </div>

        </form>

    </div>

</div>

@endsection