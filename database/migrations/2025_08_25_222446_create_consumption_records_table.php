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
        Schema::create('consumption_records', function (Blueprint $table) {
            $table->id(); // Chave primária padrão do Laravel

            // Cria a coluna 'user_id' e a define como chave estrangeira para a tabela 'users'
            // Não usamos unique() aqui porque um usuário pode ter muitos registros de consumo
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->date('data_registro');
            $table->integer('quantidade_cigarros')->nullable(); // Corrigido o erro de digitação e permitindo NULL
            $table->text('observacoes')->nullable(); // Permitindo NULL
            $table->time('horario_primeiro_cigarro')->nullable(); // Permitindo NULL
            $table->time('horario_ultimo_cigarro')->nullable(); // Corrigido o espaço e permitindo NULL

            $table->timestamps(); // Adiciona automaticamente created_at e updated_at (TIMESTAMP NULL)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consumption_records');
    }
};
 