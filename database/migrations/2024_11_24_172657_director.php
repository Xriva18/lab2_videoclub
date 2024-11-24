<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('directores', function (Blueprint $table) {
            $table->id('dir_id'); 
            $table->string('dir_nombre', 60); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('directores');
    }
};
