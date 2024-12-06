<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Reserva;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReservaAppTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_reserva()
    {
        $reservaData = [
            'nombre' => 'John Doe',
            'dni' => '12345678',
            'fecha_entrada' => '2024-10-10',
            'fecha_salida' => '2024-10-15',
            'tipo_habitacion' => 'Matrimonial',
        ];

        $reserva = Reserva::create($reservaData);

        $this->assertDatabaseHas('reservas', $reservaData);
    }

    /** @test */
    public function it_can_update_a_reserva()
    {
        $reserva = Reserva::factory()->create();

        $updatedData = [
            'nombre' => 'Jane Doe',
            'dni' => $reserva->dni,
            'fecha_entrada' => '2024-10-12',
            'fecha_salida' => '2024-10-18',
            'tipo_habitacion' => 'Doble',
        ];

        $reserva->update($updatedData);

        $this->assertDatabaseHas('reservas', $updatedData);
    }

    /** @test */
    public function it_can_delete_a_reserva()
{
    // Crea una reserva en la base de datos
    $reserva = Reserva::factory()->create();

    // Asegúrate de que la reserva existe antes de eliminarla
    $this->assertDatabaseHas('reservas', [
        'id' => $reserva->id,
        'nombre' => $reserva->nombre,
    ]);

    // Elimina la reserva
    $reserva->delete();

    // Verifica que la reserva ha sido eliminada
    $this->assertDatabaseMissing('reservas', [
        'id' => $reserva->id,
        'nombre' => $reserva->nombre,
    ]);
}

    /** @test */
    public function it_requires_a_name()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);

        Reserva::create([
            'dni' => '12345678',
            'fecha_entrada' => '2024-10-10',
            'fecha_salida' => '2024-10-15',
            'tipo_habitacion' => 'Matrimonial',
        ]);
    }

    /** @test */
    public function it_requires_a_unique_dni()
    {
        Reserva::create([
            'nombre' => 'John Doe',
            'dni' => '12345678',
            'fecha_entrada' => '2024-10-10',
            'fecha_salida' => '2024-10-15',
            'tipo_habitacion' => 'Matrimonial',
        ]);

        $this->expectException(\Illuminate\Database\QueryException::class);

        Reserva::create([
            'nombre' => 'Jane Doe',
            'dni' => '12345678', // El mismo DNI
            'fecha_entrada' => '2024-10-12',
            'fecha_salida' => '2024-10-18',
            'tipo_habitacion' => 'Doble',
        ]);
    }
}
