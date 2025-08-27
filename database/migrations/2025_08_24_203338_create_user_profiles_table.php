<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();

            // Chave estrangeira 
            $table->unsignedBigInteger('user_id')->unique();

            // Campos do onboarding (RF05)
            $table->integer('cigarros_por_dia_inicial')->nullable();
            $table->integer('tempo_fumando_anos')->nullable();
            $table->boolean('pratica_atividade_fisica')->default(false);
            $table->integer('frequencia_semanal_exercicio')->nullable()->comment('Dias por semana');
            $table->integer('tempo_exercicio_minutos')->nullable()->comment('Duração por sessão em minutos');
            $table->json('hobbies')->nullable()->comment('Array de hobbies em JSON');
            $table->enum('objetivo_reducao', ['parar_completamente', 'reduzir_gradualmente', 'manter_controle'])->nullable();
            $table->integer('meta_cigarros_dia')->nullable();
            $table->string('contato_emergencia_nome', 255)->nullable();
            $table->string('contato_emergencia_telefone', 50)->nullable();

            // Campo para controle do onboarding (RF04)
            $table->boolean('onboarding_concluido')->default(false);

            // Sistema de pontuação
            $table->integer('pontuacao_total')->default(0);

            $table->timestamps();

            // Chave estrangeira
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
