<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habitaciones - Wanka Palace</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo general */
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('{{ asset('Imagenes/login.jpg') }}'); /* Imagen de fondo */
            background-size: cover; /* Ajustar la imagen al tamaño de la pantalla */
            background-repeat: no-repeat; /* Evitar que la imagen se repita */
            background-attachment: fixed; /* Fijar la imagen al fondo */
            background-position: center; /* Centrar la imagen */
            color: #000; /* Texto en negro */
            padding-top: 30px;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #000000;
            text-align: center;
            margin-bottom: 2rem;
        }

        .card {
            border: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .card-img-top {
            border-radius: 10px;
            height: 200px; /* Tamaño uniforme para las imágenes */
            object-fit: cover; /* Ajustar imagen sin deformarla */
        }

        .card-body {
            padding: 1.5rem;
            color: #000; /* Texto negro */
        }

        .card-body h5 {
            font-size: 1.5rem;
            color: #007bff; /* Subtítulos en azul */
        }

        .card-body p {
            font-size: 1.1rem;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            padding: 10px 20px;
            font-size: 1.1rem;
            transition: background-color 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        /* Animaciones de entrada */
        .fade-in {
            opacity: 0;
            animation: fadeIn 1s forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        /* Diseño responsivo */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            .card-body h5 {
                font-size: 1.3rem;
            }

            .card-body p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

    <div class="container mt-5 fade-in">
        <h1>Habitaciones disponibles</h1>

        <div class="row">
            <!-- Habitaciones -->
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('Imagenes/matrimonial.jpg') }}" class="card-img-top" alt="Habitación Matrimonial">
                    <div class="card-body">
                        <h5 class="card-title">Matrimonial</h5>
                        <p class="card-text">Precio: S/200 por noche</p>
                        <p class="card-text">Disponible: <span class="text-success">Sí</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('Imagenes/suite.jpg') }}" class="card-img-top" alt="Suite">
                    <div class="card-body">
                        <h5 class="card-title">Suite</h5>
                        <p class="card-text">Precio: S/400 por noche</p>
                        <p class="card-text">Disponible: <span class="text-danger">No</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('Imagenes/normal.jpg') }}" class="card-img-top" alt="Habitación Normal">
                    <div class="card-body">
                        <h5 class="card-title">Normal</h5>
                        <p class="card-text">Precio: S/150 por noche</p>
                        <p class="card-text">Disponible: <span class="text-success">Sí</span></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botón de Atrás -->
        <div class="mt-4 text-center">
            <button type="button" class="btn btn-secondary" onclick="history.back()">Atrás</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
