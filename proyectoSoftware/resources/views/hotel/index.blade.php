<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wanka Palace - Inicio</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-image: url('{{ asset('Imagenes/login.jpg') }}'); /* Reemplaza con la ruta de tu imagen */
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            color: white; /* Ajusta el color del texto para buen contraste */
        }

        .content {
            min-height: calc(100vh - 60px); /* Resta la altura de la navbar y footer */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5); /* Fondo semi-transparente */
            padding: 20px;
        }

        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
        }

        h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .lead {
            font-size: 1.2rem;
        }

        .navbar-nav .nav-link {
            font-size: 1.1rem;
            margin-right: 15px;
            transition: color 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: #fff;
            text-decoration: underline;
        }

        .card-title {
            font-size: 1.6rem;
            color: #007bff;
        }

        .card-text {
            font-size: 1.1rem;
            color: black; /* Cambiamos el color del texto de las descripciones a negro */
        }

        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            background-color: rgba(0, 123, 255, 0.8); /* Fondo semi-transparente */
            color: white;
            padding: 10px 0;
        }
    </style>
</head>
<body>

    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="{{ route('inicio') }}">Wanka Palace</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('informacion') }}">Información</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('habitaciones') }}">Habitaciones</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('ofertas') }}">Ofertas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('reservar') }}">Reservar</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contacto') }}">Contáctenos</a></li>
            </ul>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="content">
        <h1>Bienvenidos a Wanka Palace</h1>
        <p class="lead">El lugar ideal para una experiencia inolvidable en Huancayo.</p>

        <div class="row justify-content-center mt-4">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Comodidad</h5>
                        <p class="card-text">Habitaciones cómodas con todas las comodidades modernas.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Lujo</h5>
                        <p class="card-text">Disfruta de un ambiente sofisticado y elegante.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Atención 24/7</h5>
                        <p class="card-text">Estamos disponibles para ayudarte en todo momento.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie de página -->
    <footer>
        <p>&copy; 2024 Wanka Palace. Todos los derechos reservados.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
