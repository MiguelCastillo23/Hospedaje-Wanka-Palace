@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-md-4 col-lg-3">
            <div class="card shadow-lg border-0 rounded-lg">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card-header bg-primary text-white text-center py-4">
                    <h4 class="mb-0">Iniciar Sesión</h4>
                </div>

                <div class="card-body p-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Tu correo electrónico">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password" required placeholder="Tu contraseña">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2">Ingresar</button>
                    </form>

                    <div class="mt-4 text-center">
                        <a href="{{ route('register') }}" class="text-decoration-none text-primary">¿No tienes una cuenta? Regístrate aquí</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
