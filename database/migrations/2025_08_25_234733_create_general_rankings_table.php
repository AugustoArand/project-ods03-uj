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
        Schema::create('general_rankings', function (Blueprint $table) {
            $table->id(); // Chave primária padrão do Laravel (BIGINT UNSIGNED AUTO_INCREMENT)

            // Chave estrangeira para o usuário, com restrição de unicidade
            // Um usuário só deve ter um registro no ranking geral.
            $table->foreignId('user_id')->constrained('users')->unique()->onDelete('cascade');
            
            $table->integer('posicao')->nullable();
            $table->integer('pontuacao_total')->nullable();
            $table->string('periodo', 50)->nullable(); // Ex: 'diario', 'semanal', 'mensal', 'geral'
            $table->date('data_referencia')->nullable(); // Data de referência do ranking

            $table->timestamps(); // Adiciona automaticamente 'created_at' e 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_rankings');
    }
};
