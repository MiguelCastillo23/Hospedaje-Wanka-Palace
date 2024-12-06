<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Wanka Palace</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo general */
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('{{ asset('Imagenes/login.jpg') }}');
            padding-top: 50px;
            color: #000; /* Todas las letras en negro */
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #0056b3; /* Puedes ajustar el color del título si lo prefieres negro */
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .form-group label {
            font-size: 1.1rem;
            color: #000; /* Etiquetas en negro */
        }

        .form-control {
            font-size: 1.1rem;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ced4da;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: #0056b3;
            box-shadow: 0 0 5px rgba(0, 86, 179, 0.5);
        }

        .btn-primary {
            background-color: #0056b3;
            border: none;
            padding: 12px 20px;
            font-size: 1.2rem;
            width: 100%;
            border-radius: 8px;
            transition: background-color 0.3s ease;
            color: #fff; /* Texto de los botones en blanco */
        }

        .btn-primary:hover {
            background-color: #003c7d;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            padding: 12px 20px;
            font-size: 1.2rem;
            width: 100%;
            border-radius: 8px;
            transition: background-color 0.3s ease;
            color: #fff; /* Texto de los botones en blanco */
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-radius: 8px;
            padding: 15px;
            font-size: 1.1rem;
            margin-bottom: 20px;
        }

        /* Estilo para los textarea */
        textarea.form-control {
            font-size: 1.1rem;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ced4da;
            height: 150px;
        }

        /* Estilo para los botones en móviles */
        @media (max-width: 768px) {
            .btn-primary, .btn-secondary {
                font-size: 1rem;
                padding: 10px 15px;
            }

            .container {
                padding: 15px;
            }
        }

        /* Animación de entrada */
        .fade-in {
            opacity: 0;
            animation: fadeIn 1s forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>

    <div class="container mt-5 fade-in">
        <h1>Contáctanos</h1>

        <!-- Mostrar el mensaje de confirmación -->
        @if(session('mensaje'))
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif

        <!-- Formulario de contacto -->
        <form action="{{ route('contacto.guardar') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre Completo</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="form-group">
                <label for="mensaje">Mensaje</label>
                <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary" aria-label="Enviar Mensaje">Enviar Mensaje</button>
            <button type="button" class="btn btn-secondary" onclick="history.back()" aria-label="Volver a la página anterior">Volver</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
