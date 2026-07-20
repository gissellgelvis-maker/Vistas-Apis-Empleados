@extends('layouts.app')

@section('title', 'Nuevo Empleado')

@section('content')

<div class="card-editar-empleado shadow">

    <div class="encabezado-de-editar">
        <h4 class="titulo-editar-empleado mb-0">Registrar Empleado</h4>
    </div>

    @if ($errors->any())

    <div class="alert alert-danger m-3">

        <strong>Se encontraron los siguientes errores:</strong>

        <ul class="mb-0 mt-2">

            @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

    @endif

    <div class="cuerpo-editar-empleado">

        <form action="{{ route('empleados.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label-editar">Nombres</label>

                <input
                    type="text"
                    name="nombres"
                    value="{{ old('nombres') }}"
                    class="input-editar-empleado @error('nombres') is-invalid @enderror">

                @error('nombres')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label-editar">Apellidos</label>

                <input
                    type="text"
                    name="apellidos"
                    value="{{ old('apellidos') }}"
                    class="input-editar-empleado @error('apellidos') is-invalid @enderror">

                @error('apellidos')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label-editar">Fecha de nacimiento</label>

                <input
                    type="date"
                    name="fecha_nacimiento"
                    value="{{ old('fecha_nacimiento') }}"
                    class="input-editar-empleado @error('fecha_nacimiento') is-invalid @enderror">

                @error('fecha_nacimiento')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label-editar">Fecha de ingreso</label>

                <input
                    type="date"
                    name="fecha_ingreso"
                    value="{{ old('fecha_ingreso') }}"
                    class="input-editar-empleado @error('fecha_ingreso') is-invalid @enderror">

                @error('fecha_ingreso')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label-editar">Salario</label>

                <input
                    type="number"
                    name="salario"
                    value="{{ old('salario') }}"
                    class="input-editar-empleado @error('salario') is-invalid @enderror">

                @error('salario')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label-editar">Cargo</label>

                <select
                    name="id_cargo"
                    class="input-editar-empleado @error('id_cargo') is-invalid @enderror">

                    <option value="">Seleccione un cargo</option>

                    @foreach($cargos['data'] as $cargo)

                    <option
                        value="{{ $cargo['id_cargo'] }}"
                        {{ old('id_cargo') == $cargo['id_cargo'] ? 'selected' : '' }}>

                        {{ $cargo['nombre_cargo'] }}

                    </option>

                    @endforeach

                </select>

                @error('id_cargo')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label-editar">Estado</label>

                <select
                    name="estado"
                    class="input-editar-empleado @error('estado') is-invalid @enderror">

                    <option value="activo" {{ old('estado') == 'activo' ? 'selected' : '' }}>
                        Activo
                    </option>

                    <option value="inactivo" {{ old('estado') == 'inactivo' ? 'selected' : '' }}>
                        Inactivo
                    </option>

                </select>

                @error('estado')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="botones-editar-empleado">
                <button class="btn-guardar-empleado">
                    Guardar
                </button>

                <a href="{{ route('empleados.index') }}" class="btn-cancelar-empleado">
                    Cancelar
                </a>
            </div>

        </form>

    </div>

</div>

@endsection