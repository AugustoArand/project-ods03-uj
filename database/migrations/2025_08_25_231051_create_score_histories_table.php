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
        Schema::create('score_histories', function (Blueprint $table) {
            $table->id(); // Chave primária padrão do Laravel

            // Cria a coluna 'user_id' e a define como chave estrangeira para a tabela 'users'
            // Não usamos unique() aqui porque um usuário pode ter muitos registros de pontuação
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            $table->date('data_pontuacao')->nullable(); // Permitindo NULL
            $table->string('tipo_acao', 255)->nullable(); // Permitindo NULL
            $table->integer('pontos_ganhos')->nullable(); // Permitindo NULL
            $table->integer('pontos_perdidos')->nullable(); // Permitindo NULL
            $table->text('descricao')->nullable(); // Permitindo NULL
            $table->integer('pontuacao_total_dia')->nullable(); // Permitindo NULL

            $table->timestamps(); // created_at e updated_at
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('score_histories');
    }
};
