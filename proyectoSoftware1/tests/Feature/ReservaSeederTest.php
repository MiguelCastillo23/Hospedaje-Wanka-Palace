<?php

namespace Tests\Feature;

use App\Models\Reserva;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ReservaSeederTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_seeds_reservas()
    {
        // Act: Ejecutar el seeder
        Artisan::call('db:seed --class=ReservaSeeder');

        // Assert: Verificar que se han creado reservas en la base de datos
        $this->assertEquals(30, Reserva::count());
        
        // Verifica que al menos una reserva tenga datos válidos
        $reserva = Reserva::first();
        $this->assertNotNull($reserva->nombre);
        $this->assertNotNull($reserva->dni);
        $this->assertNotNull($reserva->fecha_entrada);
        $this->assertNotNull($reserva->fecha_salida);
        $this->assertNotNull($reserva->tipo_habitacion);
    }
}
