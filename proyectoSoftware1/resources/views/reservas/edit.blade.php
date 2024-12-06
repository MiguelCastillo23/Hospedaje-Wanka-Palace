@extends('layouts.app')

@section('title', 'Editar Reserva')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Editar Reserva</h1>

        <!-- Mensaje de error en caso de validación -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reservas.update', $reserva->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Campos del formulario -->
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" name="dni" id="dni" class="form-control" value="{{ old('dni', $reserva->dni) }}" required>
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $reserva->nombre) }}" required>
            </div>

            <div class="mb-3">
                <label for="apellido_paterno" class="form-label">Apellido Paterno</label>
                <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" value="{{ old('apellido_paterno', $reserva->apellido_paterno) }}" required>
            </div>

            <div class="mb-3">
                <label for="apellido_materno" class="form-label">Apellido Materno</label>
                <input type="text" name="apellido_materno" id="apellido_materno" class="form-control" value="{{ old('apellido_materno', $reserva->apellido_materno) }}" required>
            </div>

            <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="number" name="edad" id="edad" class="form-control" value="{{ old('edad', $reserva->edad) }}" required>
            </div>

            <div class="mb-3">
                <label for="celular" class="form-label">Celular</label>
                <input type="text" name="celular" id="celular" class="form-control" value="{{ old('celular', $reserva->celular) }}" required>
            </div>

            <div class="mb-3">
                <label for="fecha_entrada" class="form-label">Fecha de Entrada</label>
                <input type="date" name="fecha_entrada" id="fecha_entrada" class="form-control" value="{{ old('fecha_entrada', $reserva->fecha_entrada) }}" required>
            </div>

            <div class="mb-3">
                <label for="fecha_salida" class="form-label">Fecha de Salida</label>
                <input type="date" name="fecha_salida" id="fecha_salida" class="form-control" value="{{ old('fecha_salida', $reserva->fecha_salida) }}" required>
            </div>

            <div class="mb-3">
                <label for="tipo_cuarto" class="form-label">Tipo de Cuarto</label>
                <select name="tipo_cuarto" id="tipo_cuarto" class="form-control" required>
                    <option value="matrimonial" {{ old('tipo_cuarto', $reserva->tipo_cuarto) == 'matrimonial' ? 'selected' : '' }}>Matrimonial</option>
                    <option value="suite" {{ old('tipo_cuarto', $reserva->tipo_cuarto) == 'suite' ? 'selected' : '' }}>Suite</option>
                    <option value="normal" {{ old('tipo_cuarto', $reserva->tipo_cuarto) == 'normal' ? 'selected' : '' }}>Normal</option>
                    <option value="doble" {{ old('tipo_cuarto', $reserva->tipo_cuarto) == 'doble' ? 'selected' : '' }}>Doble</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="servicios" class="form-label">Servicios Adicionales</label>
                @php
                    $servicios = old('servicios', is_array($reserva->servicios) ? $reserva->servicios : json_decode($reserva->servicios, true) ?? []);
                @endphp
                <div class="form-check">
                    <input type="checkbox" name="servicios[]" value="Wifi" class="form-check-input" id="servicio_wifi" {{ in_array('Wifi', $servicios) ? 'checked' : '' }}>
                    <label for="servicio_wifi" class="form-check-label">Wifi</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="servicios[]" value="Desayuno" class="form-check-input" id="servicio_desayuno" {{ in_array('Desayuno', $servicios) ? 'checked' : '' }}>
                    <label for="servicio_desayuno" class="form-check-label">Desayuno</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="servicios[]" value="Estacionamiento" class="form-check-input" id="servicio_estacionamiento" {{ in_array('Estacionamiento', $servicios) ? 'checked' : '' }}>
                    <label for="servicio_estacionamiento" class="form-check-label">Estacionamiento</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="metodo_pago" class="form-label">Método de Pago</label>
                <input type="text" name="metodo_pago" id="metodo_pago" class="form-control" value="{{ old('metodo_pago', $reserva->metodo_pago) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Reserva</button>
            <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
