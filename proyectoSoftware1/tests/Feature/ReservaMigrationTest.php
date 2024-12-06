<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ReservaMigrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function reservas_table_is_created()
    {
        // Assert: Verifica que la tabla 'reservas' existe
        $this->assertTrue(Schema::hasTable('reservas'));

        // Assert: Verifica que la tabla tiene las columnas necesarias
        $this->assertTrue(Schema::hasColumns('reservas', [
            'id', 
            'nombre', 
            'dni', 
            'fecha_entrada', 
            'fecha_salida', 
            'tipo_habitacion', 
            'created_at', 
            'updated_at'
        ]));
    }
}
