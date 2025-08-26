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
        Schema::create('daily_activities', function (Blueprint $table) {
            $table->id(); // Chave primária padrão do Laravel

            // Cria a coluna 'user_id' e a define como chave estrangeira para a tabela 'users'
            // Não usamos unique() aqui porque um usuário pode ter muitos registros de consumo
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps(); // Adiciona automaticamente created_at e updated_at (TIMESTAMP NULL)

            // Outras colunas específicas para atividades diárias
            $table->date('data_atividade')->nullable();
            $table->integer('consumiu_agua_suficiente')->nullable();
            $table->integer('quantidade_agua_ml')->nullable();
            $table->boolean('alimentacao_equilibrada')->nullable();
            $table->boolean('realizou_exercicio')->nullable();
            $table->string('tipo_exercicio', 255)->nullable();
            $table->integer('duracao_exercicio_min')->nullable();
            $table->boolean('consumiu_junk_food')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_activities');
    }
};
