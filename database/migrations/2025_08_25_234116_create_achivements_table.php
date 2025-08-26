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
        Schema::create('achivements', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY
            
            $table->string('nome', 255);
            $table->text('descricao')->nullable();
            $table->string('icone', 255)->nullable();
            $table->integer('pontos_necessarios')->nullable();
            $table->string('criterio', 255)->nullable();
            $table->boolean('ativa')->nullable();
            
            $table->timestamps(); // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achivements');
    }
};
