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
        Schema::create('historial_visitas', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('id_visitante')->constrained('visitantes')->onDelete('cascade');
            $table->foreignId('id_residente')->constrained('residentes')->onDelete('cascade'); 
            $table->timestamp('fecha_hora_entrada'); 
            $table->timestamp('fecha_hora_salida')->nullable(); 
            $table->foreignId('id_punto_entrada')->constrained('punto_accesos')->onDelete('cascade');
            $table->foreignId('id_punto_salida')->constrained('punto_accesos')->onDelete('cascade');
            $table->string('comentarios')->nullable(); 
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_visitas');
    }
};
