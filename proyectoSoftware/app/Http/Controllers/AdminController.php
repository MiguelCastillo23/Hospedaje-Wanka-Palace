<?php
namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Constructor para proteger las rutas
    public function __construct()
    {
        $this->middleware('auth');  // Solo accesible para usuarios autenticados
    }

    // Mostrar todas las reservas
    public function index()
    {
        $reservas = Reserva::all();  // Recuperamos todas las reservas
        return view('admin.reservas.index', compact('reservas'));
    }

    // Cambiar el estado de una reserva (aceptar o rechazar)
    public function updateStatus(Request $request, $id)
    {
        $reserva = Reserva::findOrFail($id);
        
        // Validación del estado
        $request->validate([
            'estado' => 'required|in:pendiente,aceptada,rechazada'
        ]);
        
        // Actualizar el estado de la reserva
        $reserva->estado = $request->estado;
        $reserva->save();

        return redirect()->route('admin.reservas.index')->with('success', 'Estado de la reserva actualizado');
    }

    // Eliminar una reserva
    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();

        return redirect()->route('admin.reservas.index')->with('success', 'Reserva eliminada exitosamente');
    }
}
