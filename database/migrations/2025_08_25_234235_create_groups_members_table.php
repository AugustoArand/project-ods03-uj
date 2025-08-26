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
        Schema::create('group_members', function (Blueprint $table) {
            $table->id(); // Chave primária padrão do Laravel (BIGINT UNSIGNED AUTO_INCREMENT)

            // Chaves estrangeiras para o grupo e o usuário, referenciando as tabelas 'groups' e 'users'
            $table->foreignId('group_id')->constrained('groups')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            $table->string('papel', 50)->nullable(); // Campo 'papel' (ex: admin, membro)
            $table->dateTime('data_entrada')->nullable(); // Campo 'data_entrada'
            $table->boolean('ativo')->nullable(); // Campo 'ativo'

            $table->timestamps(); // Adiciona automaticamente 'created_at' e 'updated_at'

            // Para garantir que um usuário não possa ser membro do mesmo grupo mais de uma vez
            $table->unique(['group_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_members');
    }
};
