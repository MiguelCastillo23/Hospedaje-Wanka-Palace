<?php

namespace Tests\Unit;

use App\Models\Reserva;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReservaFactoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_reserva_with_valid_data()
    {
        // Act: Crear una reserva usando la factory
        $reserva = Reserva::factory()->create();

        // Assert: Verifica que la reserva fue creada con los datos correctos
        $this->assertNotNull($reserva->id); // Verifica que el ID no sea nulo
        $this->assertNotEmpty($reserva->nombre); // Verifica que el nombre no esté vacío
        $this->assertNotEmpty($reserva->dni); // Verifica que el DNI no esté vacío
        $this->assertNotEmpty($reserva->fecha_entrada); // Verifica que la fecha de entrada esté presente
        $this->assertNotEmpty($reserva->fecha_salida); // Verifica que la fecha de salida esté presente
        $this->assertNotEmpty($reserva->tipo_habitacion); // Verifica que el tipo de habitación esté presente
    }

    /** @test */
    public function it_creates_multiple_reservas()
    {
        // Act: Crear múltiples reservas usando la factory
        $reservas = Reserva::factory()->count(5)->create();

        // Assert: Verifica que se hayan creado 5 reservas
        $this->assertCount(5, $reservas);
    }

    /** @test */
    public function it_creates_a_reserva_with_unique_dni()
    {
        // Act: Crear una reserva usando la factory
        $reserva1 = Reserva::factory()->create();
        
        // Intentar crear otra reserva con el mismo DNI
        $reserva2 = Reserva::factory()->make(['dni' => $reserva1->dni]);

        // Assert: Verifica que el segundo reserva no se haya guardado
        $this->expectException(\Illuminate\Database\QueryException::class);
        $reserva2->save();
    }
}
