<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ofertas - Wanka Palace</title>
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
            color: #000000; /* Subtítulos en azul */
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
        <h1>Ofertas Especiales</h1>

        <div class="row">
            <!-- Oferta 1 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('Imagenes/oferta1.jpg') }}" class="card-img-top" alt="Oferta 1">
                    <div class="card-body">
                        <h5 class="card-title">Descuento en Suite</h5>
                        <p class="card-text">Obtén un 20% de descuento en la reserva de una Suite. ¡Solo por esta semana!</p>
                        <p class="card-text"><strong>Precio original:</strong> S/400, <strong>Precio con descuento:</strong> S/320</p>
                    </div>
                </div>
            </div>

            <!-- Oferta 2 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('Imagenes/oferta2.jpg') }}" class="card-img-top" alt="Oferta 2">
                    <div class="card-body">
                        <h5 class="card-title">Oferta Familiar</h5>
                        <p class="card-text">Aprovecha nuestra oferta para familias: 3 noches en habitación doble por solo S/600.</p>
                    </div>
                </div>
            </div>

            <!-- Oferta 3 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('Imagenes/oferta3.jpg') }}" class="card-img-top" alt="Oferta 3">
                    <div class="card-body">
                        <h5 class="card-title">Fin de Semana Especial</h5>
                        <p class="card-text">Reserva este fin de semana y obtén un 10% de descuento adicional sobre cualquier tipo de habitación.</p>
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
