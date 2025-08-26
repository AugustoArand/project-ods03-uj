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
        Schema::create('rewards', function (Blueprint $table) {
            $table->id(); // Chave primária padrão do Laravel (BIGINT UNSIGNED AUTO_INCREMENT)

            // Chave estrangeira para o parceiro que oferece a recompensa
            $table->foreignId('partner_id')->constrained('partners')->onDelete('cascade');
            
            $table->string('titulo', 255)->notNullable();
            $table->text('descricao')->nullable();
            $table->integer('pontos_necessarios')->nullable();
            $table->decimal('desconto_percentual', 5, 2)->nullable(); // DECIMAL(5, 2)
            $table->string('codigo_desconto', 50)->nullable();
            $table->date('validade_inicio')->nullable();
            $table->date('validade_fim')->nullable();
            $table->integer('quantidade_disponivel')->nullable();
            $table->boolean('ativa')->nullable();

            $table->timestamps(); // Adiciona automaticamente 'created_at' e 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rewards');
    }
};
