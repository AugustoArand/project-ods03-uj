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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY
            
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('titulo', 255)->nullable();
            $table->text('mensagem')->nullable();
            $table->string('tipo', 100)->nullable();
            $table->boolean('lida')->default(false);
            $table->dateTime('data_envio')->nullable();
            $table->dateTime('data_leitura')->nullable();
            
            $table->timestamps(); // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};