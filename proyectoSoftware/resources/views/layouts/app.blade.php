<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wanka Palace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos personalizados */
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; }
        .navbar { background-color: #333; }
        .navbar-brand, .nav-link { color: #fff !important; }
        footer { background-color: #333; color: #fff; padding: 1em 0; text-align: center; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('hotel.informacion') }}">Wanka Palace</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('hotel.informacion') }}">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('hotel.habitaciones') }}">Habitaciones</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('hotel.contacto') }}">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('hotel.reservar') }}">Reservar</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container my-5">
        @yield('content')
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} Wanka Palace - Todos los derechos reservados</p>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
