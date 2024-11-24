<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('alquileres', function (Blueprint $table) {
            $table->id('alq_id');
            $table->foreignId('soc_id') 
            ->constrained('socios', 'soc_id')
            ->onDelete('cascade');
            $table->foreignId('pel_id') 
            ->constrained('peliculas', 'pel_id')
            ->onDelete('cascade');
            $table->date('alq_fec_desde');
            $table->date('alq_fec_hasta');
            $table->decimal('alq_valor', 10, 2);
            $table->date('alq_fec_entrega');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alquileres');
    }
};
