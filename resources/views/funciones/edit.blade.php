@extends('layouts.app')

@section('title', 'Editar Función')

@section('content')

<div class="card-form-funcion shadow">

    <div class="encabezado-form-funcion">
        <h4 class="titulo-form-funcion mb-0">Editar Función</h4>
    </div>

    <div class="cuerpo-form-funcion">

        <form action="{{ route('funciones.update', $funcion['id_funcion']) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label-funcion">Descripción</label>

                <textarea
                    name="descripcion_funcion"
                    class="input-form-funcion"
                    rows="4"
                    required>{{ old('descripcion_funcion', $funcion['descripcion_funcion']) }}</textarea>
            </div>

            <div class="mb-3">

                <label class="form-label-funcion">Cargo</label>

                <select name="id_cargo" class="input-form-funcion" required>

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

                <label class="form-label-funcion">Estado</label>
                <select name="estado" class="input-form-funcion">

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

            <div class="botones-form-funcion">
                <button class="btn-guardar-funcion">
                    Guardar
                </button>

                <a href="{{ route('funciones.index') }}"
                    class="btn-cancelar-funcion">
                    Cancelar
                </a>
            </div>

        </form>

    </div>

</div>

@endsection