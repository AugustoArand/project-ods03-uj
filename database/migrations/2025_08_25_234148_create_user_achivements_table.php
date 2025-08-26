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
        Schema::create('user_achievements', function (Blueprint $table) {
            $table->id(); // Chave primária padrão

            // Definição da coluna user_id ANTES da chave estrangeira
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Definição da coluna achievement_id ANTES da chave estrangeira
            $table->foreignId('achievement_id')->constrained('achivements')->onDelete('cascade');
            
            $table->dateTime('data_conquista')->nullable();

            $table->timestamps(); // Adiciona created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_achievements');
    }
};
