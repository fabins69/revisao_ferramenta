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
    Schema::create('atividade_itens', function (Blueprint $table) {
        $table->id();
        $table->foreignId('atividade_id')->constrained()->onDelete('cascade');
        $table->string('imagem');           // URL ou caminho da imagem
        $table->string('palavra_correta');
        $table->json('opcoes');             // 4 opções
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atividade_itens');
    }
};
