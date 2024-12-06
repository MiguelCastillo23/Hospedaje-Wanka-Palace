<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Reserva;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReservaCreateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_the_create_reserva_form()
    {
        // Crear un usuario y autenticarlo
        $user = User::factory()->create();
        $this->actingAs($user);

        // Hacer una petición a la página de crear reserva
        $response = $this->get(route('reservas.create'));

        // Verificar que la respuesta es exitosa
        $response->assertStatus(200);

        // Verificar que la vista correcta está siendo utilizada
        $response->assertViewIs('reservas.create');

        // Verificar que se muestre el formulario
        $response->assertSee('Crear Nueva Reserva');
        $response->assertSee('Nombre:');
        $response->assertSee('DNI:');
        $response->assertSee('Fecha de Entrada:');
        $response->assertSee('Fecha de Salida:');
        $response->assertSee('Tipo de Habitación:');
        $response->assertSee('Guardar Reserva');
    }

    /** @test */
    public function it_creates_a_reserva()
    {
        // Crear un usuario y autenticarlo
        $user = User::factory()->create();
        $this->actingAs($user);
    
        // Datos de la nueva reserva
        $data = [
            'nombre' => 'Juan Perez',
            'dni' => '12345678',
            'fecha_entrada' => '2024-10-15',
            'fecha_salida' => '2024-10-20',
            'tipo_habitacion' => 'Matrimonial',
        ];
    
        // Hacer una petición POST para crear una nueva reserva
        $response = $this->post(route('reservas.store'), $data);
    
        // Verificar que la reserva fue creada
        $this->assertDatabaseHas('reservas', $data);
    
        // Verificar que redirige a la lista de reservas
        $response->assertRedirect(route('reservas.index'));
        // Comprobar que se muestra un mensaje de éxito
        $response->assertSessionHas('success', 'Reserva creada exitosamente.'); // Cambiar aquí el mensaje
    }

    /** @test */
    public function it_requires_fields_when_creating_a_reserva()
    {
        // Crear un usuario y autenticarlo
        $user = User::factory()->create();
        $this->actingAs($user);

        // Hacer una petición POST para crear una nueva reserva sin datos
        $response = $this->post(route('reservas.store'), []);

        // Verificar que se redirige de nuevo al formulario de creación
        $response->assertSessionHasErrors(['nombre', 'dni', 'fecha_entrada', 'fecha_salida', 'tipo_habitacion']);
        $this->assertCount(0, Reserva::all()); // Verificar que no se creó ninguna reserva
    }
}
