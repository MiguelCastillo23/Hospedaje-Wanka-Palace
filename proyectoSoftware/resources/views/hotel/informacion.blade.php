<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información - Wanka Palace</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo general */
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('{{ asset('Imagenes/login.jpg') }}'); /* Imagen de fondo */
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            color: #000; /* Texto en negro por defecto */
            padding-top: 30px;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #000000;
        }

        .card {
            border: none;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            margin-bottom: 2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
        }

        .card-body {
            color: #000; /* Texto de las tarjetas en negro */
        }

        .card-body h2 {
            color: #007bff; /* Subtítulos en azul */
            font-size: 1.8rem;
        }

        .card-body ul {
            list-style-type: none;
            padding: 0;
        }

        .card-body ul li {
            font-size: 1.1rem;
            margin: 10px 0;
        }

        .card-body ul li:before {
            content: "✔️";
            margin-right: 10px;
            color: #28a745;
        }

        .img-fluid {
            border-radius: 10px;
            transition: transform 0.3s ease;
            width: 100%;
            height: 200px; /* Ajusta según el diseño deseado */
            object-fit: cover;
        }

        .img-fluid:hover {
            transform: scale(1.1);
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

            .card-body h2 {
                font-size: 1.5rem;
            }

            .card-body ul li {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

    <div class="container mt-5 fade-in">
        <h1 class="text-center">Bienvenidos a Wanka Palace</h1>

        <!-- Sección de Misión, Visión y Quiénes Somos -->
        <div class="card">
            <div class="card-body">
                <h2>Misión</h2>
                <p>Ofrecer una experiencia inolvidable a nuestros huéspedes, combinando confort y excelente servicio en cada detalle.</p>
                
                <h2>Visión</h2>
                <p>Ser el hotel de referencia en la región, comprometido con la calidad, sostenibilidad y satisfacción de nuestros clientes.</p>
                
                <h2>¿Quiénes somos?</h2>
                <p>Somos un equipo de profesionales apasionados por la hospitalidad, dedicados a proporcionar una experiencia única y personalizada a cada huésped.</p>
            </div>
        </div>

        <!-- Nueva sección: Servicios -->
        <div class="card">
            <div class="card-body">
                <h2>Servicios</h2>
                <ul>
                    <li>Wi-Fi de alta velocidad gratuito en todo el hotel.</li>
                    <li>Desayuno buffet incluido.</li>
                    <li>Piscina al aire libre y spa.</li>
                    <li>Servicio de transporte al aeropuerto.</li>
                    <li>Gimnasio equipado.</li>
                    <li>Restaurante gourmet y servicio a la habitación.</li>
                </ul>
            </div>
        </div>

        <!-- Nueva sección: Galería de Imágenes -->
        <div class="card">
            <div class="card-body">
                <h2>Galería</h2>
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('Imagenes/lobby.jpg') }}" class="img-fluid" alt="Lobby del hotel">
                        <p class="text-center mt-2">Lobby</p>
                    </div>
                    <div class="col-md-4">
                        <img src="{{ asset('Imagenes/piscina.jpg') }}" class="img-fluid" alt="Piscina">
                        <p class="text-center mt-2">Piscina</p>
                    </div>
                    <div class="col-md-4">
                        <img src="{{ asset('Imagenes/restaurante.jpg') }}" class="img-fluid" alt="Restaurante">
                        <p class="text-center mt-2">Restaurante</p>
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
