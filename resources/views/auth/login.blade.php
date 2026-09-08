@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')

<div class="contenedor-login">

    <div class="card-login">

        <div class="encabezado-login">
            <h2 class="titulo-login">PROYECTO RDS</h2>
            <p class="subtitulo-login">Sistema de Gestión de Empleados</p>
        </div>

        <div class="cuerpo-login">

            <form action="{{ route('login.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label-login">Correo electrónico</label>

                    <input
                        type="email"
                        name="email"
                        class="input-login"
                        placeholder="Ingrese su correo"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label-login">Contraseña</label>

                    <input
                        type="password"
                        name="password"
                        class="input-login"
                        placeholder="Ingrese su contraseña"
                        required>
                </div>

                <button class="btn-iniciar-sesion">
                    Iniciar sesión
                </button>

            </form>

            <hr class="separador-login">

            <div class="registro-login">

                ¿No tienes una cuenta?

                <br>

                <a href="{{ route('register') }}" class="link-registro-login">
                    Registrarse
                </a>

            </div>

        </div>

    </div>

</div>

@endsection