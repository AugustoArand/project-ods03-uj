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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id(); // Cria a chave primária 'id' (BIGINT UNSIGNED AUTO_INCREMENT)

            // Definição da coluna user_id PRECISA vir antes da chave estrangeira
            $table->unsignedBigInteger('user_id')->unique(); // Coluna para a chave estrangeira, marcada como UNIQUE

            // Atributos da tabela user_profiles

            $table->integer('cigarros_por_dia_inicial')->nullable();
            $table->integer('tempo_fumando_anos')->nullable();
            $table->boolean('pratica_atividade_fisica')->nullable();
            $table->integer('frequencia_semanal_exercicio')->nullable();
            $table->integer('tempo_exercicio_minutos')->nullable();
            $table->text('hobbies')->nullable();
            $table->string('objetivo_reducao', 255)->nullable();
            $table->integer('meta_cigarros_dia')->nullable();
            $table->string('contato_emergencia_nome', 255)->nullable();
            $table->string('contato_emergencia_telefone', 50)->nullable();
            $table->integer('pontuacao_total')->default(0);

            $table->timestamps(); // Adiciona created_at e updated_at

            // A definição da chave estrangeira DEVE vir depois da definição da coluna 'user_id'
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
