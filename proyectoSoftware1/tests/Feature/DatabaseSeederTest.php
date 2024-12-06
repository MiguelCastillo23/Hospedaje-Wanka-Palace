<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Reserva;
use App\Models\User;

class DatabaseSeederTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_seeds_reserva_data()
    {
        // Ejecuta el seeder
        $this->seed(\Database\Seeders\DatabaseSeeder::class);

        // Verifica que se haya creado al menos una reserva
        $this->assertDatabaseCount('reservas', 30); // Cambia 30 por el número que deseas verificar

        // Opcionalmente, verifica que las reservas tengan los datos esperados
        $reserva = Reserva::first();
        $this->assertNotNull($reserva->nombre);
        $this->assertNotNull($reserva->dni);
        $this->assertNotNull($reserva->fecha_entrada);
        $this->assertNotNull($reserva->fecha_salida);
        $this->assertNotNull($reserva->tipo_habitacion);
    }
}
