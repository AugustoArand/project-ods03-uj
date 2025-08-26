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
        Schema::create('diaries', function (Blueprint $table) {
            $table->id(); // Chave primária padrão do Laravel (BIGINT UNSIGNED AUTO_INCREMENT)

            // Chave estrangeira para o usuário que criou a entrada no diário
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            $table->date('data_entrada')->notNullable(); // Data da entrada no diário
            $table->text('conteudo')->nullable(); // Conteúdo do diário
            $table->integer('humor_nivel')->nullable(); // Nível de humor (ex: 1 a 5)
            $table->text('tags')->nullable(); // Tags relacionadas à entrada (pode ser uma string JSON ou lista separada por vírgulas)

            $table->timestamps(); // Adiciona automaticamente 'created_at' e 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diaries');
    }
};
