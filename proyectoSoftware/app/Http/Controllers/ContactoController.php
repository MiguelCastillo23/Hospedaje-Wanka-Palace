<?php

// app/Http/Controllers/ContactoController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;

class ContactoController extends Controller
{
    public function guardar(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'mensaje' => 'required|string',
        ]);

        // Guardar el mensaje en la base de datos
        Contacto::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'mensaje' => $request->mensaje,
        ]);

        // Redirigir de vuelta con un mensaje de confirmación
        return redirect()->back()->with('mensaje', 'Tu mensaje ha sido enviado correctamente.');
    }
}
