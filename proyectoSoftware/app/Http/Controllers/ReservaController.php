<?php

// app/Http/Controllers/ReservaController.php
namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    // Método para guardar la reserva directamente
    public function guardar(Request $request)
    {
        $request->validate([
            'dni' => 'required|unique:reservas,dni|digits:8',
            'nombre' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255', // Cambiado a apellido_paterno
            'apellido_materno' => 'required|string|max:255',
            'edad' => 'required|integer|min:18',
            'celular' => 'required|string|max:20',
            'fecha_entrada' => 'required|date',
            'fecha_salida' => 'required|date|after_or_equal:fecha_entrada',
            'tipo_cuarto' => 'required|in:matrimonial,suite,normal,doble',
            'metodo_pago' => 'required|in:efectivo,tarjeta,transferencia',
            'servicios' => 'nullable|array',
            'servicios.*' => 'in:wifi,desayuno,estacionamiento',
        ]);

        // Calculando el total
        $total = $this->calcularTotal($request);

        // Guardando la reserva en la base de datos
        Reserva::create([
            'dni' => $request->dni,
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno, // Cambiado a apellido_paterno
            'apellido_materno' => $request->apellido_materno,
            'edad' => $request->edad,
            'celular' => $request->celular,
            'fecha_entrada' => $request->fecha_entrada,
            'fecha_salida' => $request->fecha_salida,
            'tipo_cuarto' => $request->tipo_cuarto,
            'servicios' => json_encode($request->servicios),
            'total' => $total,
            'metodo_pago' => $request->metodo_pago,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->back()->with('reserva_exitosa', 'Tu reserva ha sido realizada exitosamente.');
    }

    // Método para calcular el total de la reserva
    private function calcularTotal(Request $request)
    {
        // Precios de los cuartos
        $preciosCuarto = [
            'matrimonial' => 200,
            'suite' => 400,
            'normal' => 150,
            'doble' => 250
        ];

        // Precios de los servicios
        $preciosServicios = [
            'wifi' => 20,
            'desayuno' => 30,
            'estacionamiento' => 40
        ];

        // Calculamos el precio base del cuarto
        $total = $preciosCuarto[$request->tipo_cuarto] ?? 0;

        // Si se seleccionaron servicios, sumamos su costo
        if ($request->has('servicios')) {
            foreach ($request->servicios as $servicio) {
                $total += $preciosServicios[$servicio] ?? 0;
            }
        }

        return $total;
    }
}
