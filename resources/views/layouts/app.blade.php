<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Proyecto RDS')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">

    @if(session()->has('token'))
        @include('partials.navbar')
    @endif

    <main class="container mt-4">
        @yield('content')
    </main>

</body>
</html>