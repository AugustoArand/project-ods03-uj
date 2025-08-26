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
        Schema::create('notification_settings', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY
            
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');
            $table->boolean('lembrete_registro')->nullable();
            $table->time('horario_lembrete')->nullable();
            $table->boolean('motivacao_diaria')->nullable();
            $table->boolean('ranking_semanal')->nullable();
            $table->boolean('conquistas')->nullable();
            $table->boolean('desafios')->nullable();
            
            $table->timestamps(); // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification_settings');
    }
};