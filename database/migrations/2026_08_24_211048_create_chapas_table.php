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
    Schema::create('chapas', function (Blueprint $table) {
        $table->id();
        $table->string('numero', 10);
        $table->foreignId('eleicao_id')->constrained('eleicoes')->onDelete('cascade');
        $table->foreignId('diretor_id')->constrained('candidatos')->onDelete('cascade');
        $table->foreignId('coordenador1_id')->constrained('candidatos')->onDelete('cascade');
        $table->foreignId('coordenador2_id')->constrained('candidatos')->onDelete('cascade');
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('chapas');
}
};
