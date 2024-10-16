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
        Schema::create('visitas_programadas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_residente')->constrained('residentes')->onDelete('cascade'); 
            $table->foreignId('id_visitante')->constrained('visitantes')->onDelete('cascade');
            $table->timestamp('fecha_hora_programada');
            $table->string('motivo_visita')->nullable(); 
            $table->enum('estado', ['pendiente', 'cancelada', 'completada']);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visita_programadas');
    }
};
