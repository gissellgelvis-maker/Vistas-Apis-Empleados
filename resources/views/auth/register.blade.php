@extends('layouts.app')

@section('title', 'Crear cuenta')

@section('content')

<div class="contenedor-login">

    <div class="card-login">

        <div class="encabezado-login">
            <h2 class="titulo-login">PROYECTO RDS</h2>
            <p class="subtitulo-login">Crear una cuenta</p>
        </div>

        <div class="cuerpo-login">

            <form action="{{ route('register.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label-login">Nombre</label>
                    <input
                        type="text"
                        name="name"
                        class="input-login"
                        placeholder="Ingrese su nombre"
                        required>
                </div>

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
                        placeholder="Mínimo 8 caracteres"
                        required>
                </div>

                <button class="btn-iniciar-sesion">
                    Registrarse
                </button>

            </form>

            <hr class="separador-login">

            <div class="registro-login">
                ¿Ya tienes una cuenta?
                <br>
                <a href="{{ route('login') }}" class="link-registro-login">
                    Iniciar sesión
                </a>
            </div>

        </div>

    </div>

</div>

@endsection