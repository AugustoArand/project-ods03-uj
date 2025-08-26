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
        Schema::create('groups', function (Blueprint $table) {
            $table->id(); // Chave primária padrão do Laravel (BIGINT UNSIGNED AUTO_INCREMENT)
            $table->string('nome', 255)->notNullable(); // Campo 'nome'
            $table->text('descricao')->nullable(); // Campo 'descricao'
            
            // Chave estrangeira para o criador do grupo, referenciando a tabela 'users'
            $table->foreignId('creator_id')->constrained('users')->onDelete('cascade');
            
            $table->integer('limite_membros')->nullable(); // Campo 'limite_membros'
            $table->boolean('publico')->nullable(); // Campo 'publico'
            $table->boolean('ativo')->nullable(); // Campo 'ativo'

            $table->timestamps(); // Adiciona automaticamente 'created_at' e 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
