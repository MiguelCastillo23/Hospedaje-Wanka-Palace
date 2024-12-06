@extends('layouts.app')
@section('title', 'Iniciar Sesión')
@section('content')
    <style>
        html, body {
            height: 100%;
            margin: 0;
            overflow: hidden;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-image: url('{{ asset('Imagenes/login.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            background-blend-mode: overlay;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.9); /* Transparencia añadida */
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2), 
                        0 10px 20px rgba(0,0,0,0.15),
                        0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            width: 100%;
            max-width: 400px;
            backdrop-filter: blur(5px); /* Efecto de desenfoque adicional */
        }

        .login-card:hover {
            transform: scale(1.02);
            box-shadow: 0 25px 50px rgba(0,0,0,0.25), 
                        0 15px 25px rgba(0,0,0,0.2),
                        0 5px 10px rgba(0,0,0,0.15);
        }

        .card-header {
            background: linear-gradient(to right, rgba(52,148,230,0.9), rgba(41,128,185,0.9));
            color: white;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        }

        .form-control {
            background: rgba(255,255,255,0.8);
            border-radius: 10px;
            border: 1px solid rgba(224,224,224,0.5);
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: white;
            border-color: #3494E6;
            box-shadow: 0 0 0 0.2rem rgba(52,148,230,0.25);
        }

        .btn-primary {
            background: linear-gradient(to right, #3494E6, #2980B9);
            border: none;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            background: linear-gradient(to right, #2980B9, #3494E6);
        }

        .register-link {
            color: #3494E6;
            transition: color 0.3s ease;
            font-size: 0.9rem;
        }

        .register-link:hover {
            color: #2980B9;
            text-decoration: underline;
        }
    </style>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card login-card shadow-lg rounded">
            <div class="card-header text-center py-3">
                <h3 class="mb-0">Iniciar Sesión</h3>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control py-2" id="email" name="email" value="{{ old('email') }}" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control py-2" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2">Ingresar</button>
                </form>
                <div class="mt-3 text-center">
                    <a href="{{ route('register') }}" class="text-decoration-none register-link">¿No tienes una cuenta? Regístrate aquí</a>
                </div>
            </div>
        </div>
    </div>
@endsection
