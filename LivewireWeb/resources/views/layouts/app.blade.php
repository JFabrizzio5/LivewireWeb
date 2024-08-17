<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    <!-- Aquí puedes incluir tus estilos -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <header>
        <!-- Aquí puedes poner el header -->
        <script src="{{ mix('js/app.js') }}"></script>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <!-- Aquí puedes poner el footer -->

    </footer>
    <!-- Aquí puedes incluir tus scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
