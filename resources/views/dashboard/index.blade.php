@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-body">

            <h2>¡Bienvenido!</h2>

            <p>Has iniciado sesión correctamente.</p>

            <hr>

            <p><strong>Usuario:</strong> {{ session('user.name') }}</p>

            <p><strong>Correo:</strong> {{ session('user.email') }}</p>

        </div>

    </div>

</div>

@endsection