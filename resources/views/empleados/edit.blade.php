@extends('layouts.app')

@section('title', 'Editar Empleado')

@section('content')

<div class="card shadow">

    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Editar Empleado</h4>
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

    <div class="card-body">

        <form action="{{ route('empleados.update', $empleado['id_empleado']) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nombres</label>

                <input
                    type="text"
                    name="nombres"
                    value="{{ old('nombres', $empleado['nombres']) }}"
                    class="form-control @error('nombres') is-invalid @enderror">

                @error('nombres')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Apellidos</label>

                <input
                    type="text"
                    name="apellidos"
                    value="{{ old('apellidos', $empleado['apellidos']) }}"
                    class="form-control @error('apellidos') is-invalid @enderror">

                @error('apellidos')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha de nacimiento</label>

                <input
                    type="date"
                    name="fecha_nacimiento"
                    value="{{ old('fecha_nacimiento', $empleado['fecha_nacimiento']) }}"
                    class="form-control @error('fecha_nacimiento') is-invalid @enderror">

                @error('fecha_nacimiento')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha de ingreso</label>

                <input
                    type="date"
                    name="fecha_ingreso"
                    value="{{ old('fecha_ingreso', $empleado['fecha_ingreso']) }}"
                    class="form-control @error('fecha_ingreso') is-invalid @enderror">

                @error('fecha_ingreso')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Salario</label>

                <input
                    type="number"
                    name="salario"
                    value="{{ old('salario', $empleado['salario']) }}"
                    class="form-control @error('salario') is-invalid @enderror">

                @error('salario')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Cargo</label>

                <select
                    name="id_cargo"
                    class="form-select @error('id_cargo') is-invalid @enderror">

                    <option value="">Seleccione un cargo</option>

                    @foreach($cargos['data'] as $cargo)

                    <option
                        value="{{ $cargo['id_cargo'] }}"
                        {{ old('id_cargo', $empleado['id_cargo']) == $cargo['id_cargo'] ? 'selected' : '' }}>
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
                <label class="form-label">Estado</label>

                <select
                    name="estado"
                    class="form-select @error('estado') is-invalid @enderror">

                    <option value="activo"
                        {{ old('estado', $empleado['estado']) == 'activo' ? 'selected' : '' }}>
                        Activo
                    </option>

                    <option value="inactivo"
                        {{ old('estado', $empleado['estado']) == 'inactivo' ? 'selected' : '' }}>
                        Inactivo
                    </option>

                </select>

                @error('estado')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button class="btn btn-success">
                Guardar
            </button>

            <a href="{{ route('empleados.index') }}" class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>

</div>

@endsection