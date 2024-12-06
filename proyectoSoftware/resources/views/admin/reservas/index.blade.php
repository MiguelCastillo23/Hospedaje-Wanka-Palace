@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reservas</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Tipo de Habitación</th>
                <th>Fecha Entrada</th>
                <th>Fecha Salida</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->dni }}</td>
                    <td>{{ $reserva->nombre }} {{ $reserva->apellido_paterno }} {{ $reserva->apellido_materno }}</td>
                    <td>{{ $reserva->tipo_cuarto }}</td>
                    <td>{{ $reserva->fecha_entrada }}</td>
                    <td>{{ $reserva->fecha_salida }}</td>
                    <td>
                        @if($reserva->estado == 'pendiente')
                            <span class="badge badge-warning">Pendiente</span>
                        @elseif($reserva->estado == 'aceptada')
                            <span class="badge badge-success">Aceptada</span>
                        @else
                            <span class="badge badge-danger">Rechazada</span>
                        @endif
                    </td>
                    <td>
                        @if($reserva->estado == 'pendiente')
                            <form action="{{ route('admin.reservas.updateStatus', $reserva->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <select name="estado" onchange="this.form.submit()" class="form-control">
                                    <option value="pendiente" {{ $reserva->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                    <option value="aceptada" {{ $reserva->estado == 'aceptada' ? 'selected' : '' }}>Aceptar</option>
                                    <option value="rechazada" {{ $reserva->estado == 'rechazada' ? 'selected' : '' }}>Rechazar</option>
                                </select>
                            </form>
                        @endif
                        <form action="{{ route('admin.reservas.destroy', $reserva->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
