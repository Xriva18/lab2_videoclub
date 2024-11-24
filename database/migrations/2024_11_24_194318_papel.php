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
        Schema::create('papeles', function (Blueprint $table) {
            $table->id('pap_id');
            $table->foreignId('act_id') 
            ->constrained('actores', 'act_id')
            ->onDelete('cascade');
            $table->foreignId('pel_id') 
            ->constrained('peliculas', 'pel_id')
            ->onDelete('cascade');
            $table->string('apl_papel', 60);
            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
