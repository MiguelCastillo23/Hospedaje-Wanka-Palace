@extends('layouts.app')

@section('title', 'Lista de Reservas')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-center text-primary">Lista de Reservas</h1>

        <!-- Mensaje de éxito después del registro -->
        @if (session('success'))
            <div class="alert alert-success shadow-sm">
                <strong>¡Éxito! </strong>{{ session('success') }}
            </div>
        @endif

        <!-- Muestra el nombre del usuario que ha iniciado sesión -->
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <strong>Usuario Logueado:</strong> <span class="font-weight-bold text-info">{{ auth()->user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Cerrar Sesión</button>
            </form>
        </div>

        <!-- Tabla de Reservas -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped shadow-sm">
                <thead class="thead-dark bg-info text-white">
                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Edad</th>
                        <th>Celular</th>
                        <th>Fecha de Entrada</th>
                        <th>Fecha de Salida</th>
                        <th>Tipo de Cuarto</th>
                        <th>Servicios Adicionales</th>
                        <th>Método de Pago</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservas as $reserva)
                        <tr>
                            <td>{{ $reserva->dni }}</td>
                            <td>{{ $reserva->nombre }}</td>
                            <td>{{ $reserva->apellido_paterno }}</td>
                            <td>{{ $reserva->apellido_materno }}</td>
                            <td>{{ $reserva->edad }}</td>
                            <td>{{ $reserva->celular }}</td>
                            <td>{{ \Carbon\Carbon::parse($reserva->fecha_entrada)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($reserva->fecha_salida)->format('d/m/Y') }}</td>
                            <td>{{ $reserva->tipo_cuarto }}</td>
                            <td>
                                @if (is_array($reserva->servicios))
                                    {{ implode(', ', $reserva->servicios) }}
                                @else
                                    {{ implode(', ', json_decode($reserva->servicios, true) ?? []) }}
                                @endif
                            </td>
                            <td>{{ $reserva->metodo_pago }}</td>
                            <td class="d-flex">
                                <a href="{{ route('reservas.edit', $reserva->id) }}" class="btn btn-warning btn-sm text-white mr-2">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .table th, .table td {
            vertical-align: middle;
        }

        .btn-sm {
            font-size: 0.85rem;
        }

        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
        }

        .shadow-sm {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table th {
            text-align: center;
        }

        .table td {
            text-align: center;
        }

        .thead-dark th {
            background-color: #343a40 !important;
            color: white;
        }

        .text-info {
            color: #17a2b8 !important;
        }
    </style>
@endpush
