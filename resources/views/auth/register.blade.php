@extends('layouts.app')

@section('title', 'Crear cuenta')

@section('content')

<div class="container d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow p-4" style="max-width: 450px; width:100%;">

        <div class="text-center mb-4">
            <h2>PROYECTO RDS</h2>
            <p class="text-muted">Crear una cuenta</p>
        </div>

        <form action="{{ route('register.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    placeholder="Ingrese su nombre"
                    required>
            </div>

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
                    placeholder="Mínimo 8 caracteres"
                    required>
            </div>

            <button class="btn btn-success w-100">
                Registrarse
            </button>

        </form>

        <hr>

        <div class="text-center">
            ¿Ya tienes una cuenta?
            <br>
            <a href="{{ route('login') }}">
                Iniciar sesión
            </a>
        </div>

    </div>

</div>

@endsection