<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reserva;

class ReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generar 20 reservas
        Reserva::factory()->count(30)->create();
    }
}
