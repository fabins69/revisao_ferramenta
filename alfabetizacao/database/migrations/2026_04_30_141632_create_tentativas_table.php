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
    Schema::create('tentativas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('aluno_id')->constrained()->onDelete('cascade');
        $table->foreignId('atividade_item_id')->constrained('atividade_itens')->onDelete('cascade');
        $table->string('resposta_dada');
        $table->boolean('acertou');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tentativas');
    }
};
