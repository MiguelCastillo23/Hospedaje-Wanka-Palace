<?php

namespace Tests\Feature;

use App\Models\Reserva;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReservaATest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_the_reserva_list()
    {
        // Arrange: Crea un usuario y autentícalo
        $user = User::factory()->create(); // Crea un usuario
        $this->actingAs($user); // Autentica al usuario

        // Crea una reserva en la base de datos
        $reserva = Reserva::create([
            'nombre' => 'Juan Pérez',
            'dni' => '12345678',
            'fecha_entrada' => '2024-10-10',
            'fecha_salida' => '2024-10-15',
            'tipo_habitacion' => 'Sencilla',
        ]);

        // Act: Realiza una solicitud GET a la ruta de reservas
        $response = $this->get(route('reservas.index'));

        // Assert: Verifica que la respuesta sea correcta y que la reserva se muestre
        $response->assertStatus(200);
        $response->assertSee($reserva->nombre);
        $response->assertSee($reserva->dni);
        $response->assertSee($reserva->fecha_entrada);
        $response->assertSee($reserva->fecha_salida);
        $response->assertSee($reserva->tipo_habitacion);
    }
}
