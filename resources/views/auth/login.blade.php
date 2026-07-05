@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')

<div class="container d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow p-4" style="max-width: 450px; width:100%;">

        <div class="text-center mb-4">
            <h2>PROYECTO RDS</h2>
            <p class="text-muted">Sistema de Gestión de Empleados</p>
        </div>

        <form action="{{ route('login.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label class="form-label">Correo electrónico</label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    placeholder="Ingrese su correo"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña</label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Ingrese su contraseña"
                    required>
            </div>

            <button class="btn btn-primary w-100">
                Iniciar sesión
            </button>

        </form>

        <hr>

        <div class="text-center">

            ¿No tienes una cuenta?

            <br>

            <a href="#">
                Registrarse
            </a>

        </div>

    </div>

</div>

@endsection