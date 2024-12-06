<?php

namespace Tests\Feature;

use App\Models\Reserva;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReservaControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_new_reserva()
    {
        // Arrange: Crea un usuario y autentícalo
        $user = User::factory()->create(); // Crea un usuario
        $this->actingAs($user); // Autentica al usuario

        // Datos de la reserva
        $data = [
            'nombre' => 'Juan Pérez',
            'dni' => '12345678',
            'fecha_entrada' => '2024-10-10',
            'fecha_salida' => '2024-10-15',
            'tipo_habitacion' => 'Matrimonial',
        ];

        // Act: Realiza una solicitud POST para crear una nueva reserva
        $response = $this->post(route('reservas.store'), $data);

        // Assert: Verifica que la reserva fue creada en la base de datos
        $this->assertDatabaseHas('reservas', [
            'nombre' => 'Juan Pérez',
            'dni' => '12345678',
            'fecha_entrada' => '2024-10-10',
            'fecha_salida' => '2024-10-15',
            'tipo_habitacion' => 'Matrimonial',
        ]);

        // Assert: Verifica que se redirige a la ruta esperada (puedes cambiar esto si es diferente)
        $response->assertRedirect(route('reservas.index'));
        // Assert: Verifica que la respuesta tenga un mensaje de éxito si lo tienes
        $response->assertSessionHas('success', 'Reserva creada exitosamente.'); // Cambia el mensaje según tu lógica
    }

    /** @test */
    public function it_displays_validation_errors_when_data_is_invalid()
    {
        // Arrange: Crea un usuario y autentícalo
        $user = User::factory()->create(); // Crea un usuario
        $this->actingAs($user); // Autentica al usuario

        // Datos inválidos para la reserva
        $data = [
            'nombre' => '',
            'dni' => '',
            'fecha_entrada' => '',
            'fecha_salida' => '',
            'tipo_habitacion' => '',
        ];

        // Act: Realiza una solicitud POST con datos inválidos
        $response = $this->post(route('reservas.store'), $data);

        // Assert: Verifica que la reserva no fue creada
        $this->assertDatabaseCount('reservas', 0);

        // Assert: Verifica que el usuario fue redirigido de nuevo al formulario
        $response->assertRedirect();
        // Assert: Verifica que los errores de validación están presentes
        $response->assertSessionHasErrors(['nombre', 'dni', 'fecha_entrada', 'fecha_salida', 'tipo_habitacion']);
    }
}
