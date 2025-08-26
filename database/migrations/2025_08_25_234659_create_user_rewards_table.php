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
        Schema::create('user_rewards', function (Blueprint $table) {
            $table->id(); // Chave primária padrão do Laravel (BIGINT UNSIGNED AUTO_INCREMENT)

            // Chaves estrangeiras para o usuário e a recompensa
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('reward_id')->constrained('rewards')->onDelete('cascade');
            
            $table->dateTime('data_resgate')->nullable();
            $table->string('codigo_utilizado', 50)->nullable();
            $table->boolean('utilizada')->nullable();
            $table->dateTime('data_utilizacao')->nullable();

            $table->timestamps(); // Adiciona automaticamente 'created_at' e 'updated_at'

            // Para garantir que um usuário não possa resgatar a mesma recompensa mais de uma vez (opcional, dependendo da regra de negócio)
            $table->unique(['user_id', 'reward_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_rewards');
    }
};
