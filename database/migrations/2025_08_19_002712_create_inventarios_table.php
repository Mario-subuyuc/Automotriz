<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventarios', function (Blueprint $table) {
        $table->id(); // ID único del vehículo
        $table->string('marca'); // Ej: Toyota, Ford, Chevrolet
        $table->string('modelo'); // Ej: Camry, F-150, Silverado
        $table->year('anio'); // Año de fabricación
        $table->decimal('precio', 10, 2); // Valor en moneda local (hasta 99,999,999.99)
        $table->enum('estado', ['Disponible', 'Vendido', 'En mantenimiento'])->default('Disponible');
        $table->integer('kilometraje')->nullable(); // Kilómetros recorridos
        $table->string('color')->nullable(); // Color del vehículo
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventarios');
    }
};
