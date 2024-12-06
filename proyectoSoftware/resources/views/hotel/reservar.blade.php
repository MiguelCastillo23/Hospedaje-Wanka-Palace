<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar - Wanka Palace</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo general */
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('{{ asset('Imagenes/login.jpg') }}'); /* Fondo con imagen */
            background-size: cover; /* La imagen cubre toda la pantalla sin distorsionarse */
            background-position: center; /* Centra la imagen */
            background-attachment: fixed; /* Fija la imagen de fondo cuando se hace scroll */
            background-repeat: no-repeat; /* No repite la imagen */
            padding-top: 30px;
            color: #000000; /* Color de texto negro para todo el cuerpo */
        }

        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #000000; /* Color de texto negro */
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-group label {
            font-size: 1.1rem;
            color: #000000; /* Color de texto negro */
        }

        .form-control {
            font-size: 1.1rem;
            padding: 0.8rem;
            border-radius: 8px;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            font-size: 1.2rem;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .alert-success {
            text-align: center;
            font-size: 1.1rem;
            padding: 15px;
            border-radius: 8px;
        }

        .checkbox-label {
            margin-left: 10px;
            font-size: 1rem;
            color: #000000; /* Color de texto negro */
        }

        /* Estilo específico para los select */
        select.form-control {
            font-size: 1.2rem; /* Aumentar el tamaño de la fuente */
            padding: 1rem; /* Aumentar el padding */
            height: 50px; /* Ajustar la altura */
            line-height: 1.5; /* Ajustar la altura de línea para centrar el texto */
        }

        /* Ajuste para las opciones dentro del select */
        select.form-control option {
            padding: 10px; /* Asegurarse de que haya espacio suficiente */
            font-size: 1rem; /* Ajustar el tamaño de la fuente en las opciones */
        }

        /* Animación de fade-in */
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
            .form-control, .btn-primary {
                font-size: 1rem;
            }
            select.form-control {
                font-size: 1rem;
                padding: 0.8rem;
                height: 40px;
            }
        }
    </style>
</head>
<body>

    <div class="container mt-5 fade-in">
        <h1>Formulario de Reserva</h1>

        <!-- Verifica si hay un mensaje de éxito en la sesión -->
        @if(session('reserva_exitosa'))
            <div class="alert alert-success">
                {{ session('reserva_exitosa') }}
            </div>
        @endif

        <form action="{{ route('reserva.guardar') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="dni">DNI</label>
                <input type="text" class="form-control" id="dni" name="dni" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellido_paterno">Apellido Paterno</label>
                <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" required>
            </div>
            <div class="form-group">
                <label for="apellido_materno">Apellido Materno</label>
                <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" required>
            </div>
            <div class="form-group">
                <label for="edad">Edad</label>
                <input type="number" class="form-control" id="edad" name="edad" required min="18">
            </div>
            <div class="form-group">
                <label for="celular">Celular</label>
                <input type="text" class="form-control" id="celular" name="celular" required>
            </div>
            <div class="form-group">
                <label for="fecha_entrada">Fecha de Entrada</label>
                <input type="date" class="form-control" id="fecha_entrada" name="fecha_entrada" required>
            </div>
            <div class="form-group">
                <label for="fecha_salida">Fecha de Salida</label>
                <input type="date" class="form-control" id="fecha_salida" name="fecha_salida" required>
            </div>
            <div class="form-group">
                <label for="tipo_cuarto">Tipo de Cuarto</label>
                <select class="form-control" id="tipo_cuarto" name="tipo_cuarto" required>
                    <option value="matrimonial">Matrimonial</option>
                    <option value="suite">Suite</option>
                    <option value="normal">Normal</option>
                    <option value="doble">Doble</option>
                </select>
            </div>
            <div class="form-group">
                <label for="servicios">Servicios Adicionales</label><br>
                <input type="checkbox" name="servicios[]" value="wifi"><label class="checkbox-label">Wifi</label><br>
                <input type="checkbox" name="servicios[]" value="desayuno"><label class="checkbox-label">Desayuno</label><br>
                <input type="checkbox" name="servicios[]" value="estacionamiento"><label class="checkbox-label">Estacionamiento</label><br>
            </div>
            <div class="form-group">
                <label for="metodo_pago">Método de Pago</label>
                <select class="form-control" id="metodo_pago" name="metodo_pago" required>
                    <option value="efectivo">Efectivo</option>
                    <option value="tarjeta">Tarjeta</option>
                    <option value="transferencia">Transferencia</option>
                </select>
            </div>

            <!-- Mostrar el monto total -->
            @isset($total)
                <div class="form-group">
                    <label for="total">Monto Total a Pagar</label>
                    <input type="text" class="form-control" id="total" value="S/. {{ number_format($total, 2) }}" readonly>
                </div>
            @endisset

            <button type="submit" class="btn btn-primary">Reservar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
