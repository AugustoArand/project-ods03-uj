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
        Schema::create('ai_sessions', function (Blueprint $table) {
            $table->id(); // Chave primária padrão do Laravel (BIGINT UNSIGNED AUTO_INCREMENT)

            // Chave estrangeira para o usuário associado à sessão de IA
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            $table->json('conversa_json')->nullable(); // Armazena a conversa como JSON
            $table->text('situacao_contexto')->nullable(); // Contexto da sessão
            $table->dateTime('data_inicio')->nullable(); // Início da sessão
            $table->dateTime('data_fim')->nullable(); // Fim da sessão
            $table->integer('duracao_minutos')->nullable(); // Duração em minutos
            $table->boolean('resolvida')->nullable(); // Indica se a questão da sessão foi resolvida

            $table->timestamps(); // Adiciona automaticamente 'created_at' e 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ai_sessions');
    }
};
