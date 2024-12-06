<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::all();
        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        return view('reservas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'dni' => 'required|string|max:8',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'edad' => 'required|integer|min:18',
            'celular' => 'required|string|max:20',
            'fecha_entrada' => 'required|date',
            'fecha_salida' => 'required|date|after:fecha_entrada',
            'tipo_cuarto' => 'required|string',
            'servicios' => 'nullable|array',
            'metodo_pago' => 'required|string',
        ]);

        Reserva::create($request->all());

        return redirect()->route('reservas.index')->with('success', 'Reserva creada exitosamente.');
    }

    public function edit($id)
    {
        $reserva = Reserva::findOrFail($id);
        return view('reservas.edit', compact('reserva'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'dni' => 'required|string|max:8',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'edad' => 'required|integer|min:18',
            'celular' => 'required|string|max:20',
            'fecha_entrada' => 'required|date',
            'fecha_salida' => 'required|date|after:fecha_entrada',
            'tipo_cuarto' => 'required|string',
            'servicios' => 'nullable|array',
            'metodo_pago' => 'required|string',
        ]);

        $reserva = Reserva::findOrFail($id);
        $reserva->update($request->all());

        return redirect()->route('reservas.index')->with('success', 'Reserva actualizada exitosamente.');
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();

        return redirect()->route('reservas.index')->with('success', 'Reserva eliminada exitosamente.');
    }
}
