<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Reserva;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReservaListViewTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_the_reserva_list_view()
    {
        // Crear un usuario y autenticarlo
        $user = User::factory()->create();
        $this->actingAs($user);

        // Crear algunas reservas
        Reserva::factory()->count(3)->create();

        // Hacer una petición a la vista de lista de reservas
        $response = $this->get(route('reservas.index'));

        // Verificar que la respuesta es exitosa
        $response->assertStatus(200);

        // Verificar que la vista correcta está siendo utilizada
        $response->assertViewIs('reservas.index');

        // Verificar que se muestren las reservas en la vista
        $response->assertSee('Lista de Reservas');
        $response->assertSee('Crear Nueva Reserva');
        
        // Verificar que los datos de reservas se muestren
        foreach (Reserva::all() as $reserva) {
            $response->assertSee($reserva->nombre);
            $response->assertSee($reserva->dni);
            $response->assertSee($reserva->fecha_entrada);
            $response->assertSee($reserva->fecha_salida);
            $response->assertSee($reserva->tipo_habitacion);
        }
    }

    /** @test */
    public function it_requires_authentication_to_access_the_reserva_list()
    {
        // Hacer una petición a la vista de lista de reservas sin autenticación
        $response = $this->get(route('reservas.index'));

        // Verificar que se redirige a la página de inicio de sesión
        $response->assertRedirect(route('login'));
    }
}
