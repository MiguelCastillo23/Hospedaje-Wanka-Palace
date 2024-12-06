@extends('layouts.app')

@section('title', 'Verificación de Correo Electrónico')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg rounded">
                <div class="card-header text-center bg-primary text-white py-4">
                    <h3>Verifica tu Correo Electrónico</h3>
                </div>
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Se ha enviado un nuevo enlace de verificación a tu correo electrónico.
                        </div>
                    @endif

                    <p>Por favor, revisa tu correo electrónico para un enlace de verificación antes de continuar.</p>
                    <p>Si no has recibido el correo, puedes solicitar uno nuevo:</p>

                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link text-decoration-none p-0 m-0 align-baseline text-primary">Haz clic aquí para solicitar otro</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
