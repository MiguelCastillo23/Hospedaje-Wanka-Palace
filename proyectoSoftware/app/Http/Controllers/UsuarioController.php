<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;  // Asegúrate de tener el modelo Contacto
use App\Models\Reserva;   // Asegúrate de tener el modelo Reserva

class UsuarioController extends Controller
{
    // Mostrar la página de inicio
    public function index()
    {
        return response()->view('hotel.index');
    }

    // Mostrar la información del hotel
    public function informacion()
    {
        return response()->view('hotel.informacion');
    }

    // Mostrar la lista de habitaciones
    public function habitaciones()
    {
        return response()->view('hotel.habitaciones');
    }

    // Mostrar las ofertas disponibles
    public function ofertas()
    {
        return response()->view('hotel.ofertas');
    }

    // Mostrar el formulario de reserva
    public function reservar()
    {
        return response()->view('hotel.reservar');
    }

    // Mostrar la página de contacto
    public function contacto()
    {
        return response()->view('hotel.contacto');
    }

    // Guardar los datos del mensaje de contacto
    public function guardarMensaje(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255',  // Asegúrate de que se valide el correo
            'mensaje' => 'required|string',
        ]);

        // Guardar el mensaje en la base de datos
        Contacto::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo, // Guardar el correo
            'mensaje' => $request->mensaje,
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('contacto')->with('mensaje', 'Tu mensaje ha sido enviado con éxito. ¡Gracias por contactarnos!');
    }

    // Guardar la reserva realizada por el usuario
    public function guardarReserva(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'dni' => 'required|string|max:20',  // Agregar validación de longitud máxima
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'edad' => 'required|integer|min:18',  // Validación para asegurar que la edad sea mayor o igual a 18
            'fecha_entrada' => 'required|date|after_or_equal:today',
            'fecha_salida' => 'required|date|after:fecha_entrada',
            'celular' => 'required|string|max:15',
            'tipo_cuarto' => 'required|string|in:matrimonial,suite,normal,doble',  // Validación para tipo de cuarto
            'total' => 'required|numeric|min:0',
            'metodo_pago' => 'required|string|in:tarjeta,efectivo',
        ]);

        // Crear la reserva
        Reserva::create([
            'dni' => $request->dni,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'apellido_materno' => $request->apellido_materno,
            'edad' => $request->edad,
            'fecha_entrada' => $request->fecha_entrada,
            'fecha_salida' => $request->fecha_salida,
            'celular' => $request->celular,
            'tipo_cuarto' => $request->tipo_cuarto,
            'total' => $request->total,
            'metodo_pago' => $request->metodo_pago,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('reservar')->with('status', 'Reserva realizada con éxito. ¡Gracias por elegir Wanka Palace!');
    }
}
