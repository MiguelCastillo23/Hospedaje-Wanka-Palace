<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'dni', 'nombre', 'apellido_paterno', 'apellido_materno', 'edad', 
        'fecha_entrada', 'fecha_salida', 'celular', 'tipo_cuarto', 
        'total', 'servicios', 'metodo_pago'
    ];

    // Aseguramos que el campo 'servicios' sea tratado como un array JSON
    protected $casts = [
        'servicios' => 'array',
    ];
}
