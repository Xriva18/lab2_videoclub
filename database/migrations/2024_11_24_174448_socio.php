<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('socios', function (Blueprint $table) {
            $table->id('soc_id'); 
            $table->char('soc_cedula', 10); 
            $table->string('soc_nombre', 60); 
            $table->string('soc_direcion', 60); 
            $table->char('soc_telefono', 10); 
            $table->string('soc_correo', 60);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        
    }
};
