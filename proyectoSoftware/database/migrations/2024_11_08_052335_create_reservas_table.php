<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->string('dni', 8)->unique(); // Ajustado para DNI de 8 caracteres y único
            $table->string('nombre');
            $table->string('apellido_paterno'); // Cambiado a apellido_paterno
            $table->string('apellido_materno');
            $table->integer('edad');
            $table->date('fecha_entrada');
            $table->date('fecha_salida');
            $table->string('celular');
            $table->enum('tipo_cuarto', ['matrimonial', 'suite', 'normal', 'doble']); // Cambiado a enum para tipo de cuarto
            $table->decimal('total', 8, 2); // Total con formato decimal
            $table->json('servicios')->nullable(); // Cambiado a JSON para servicios adicionales
            $table->enum('metodo_pago', ['efectivo', 'tarjeta', 'transferencia']); // Métodos de pago con opción predefinida
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
