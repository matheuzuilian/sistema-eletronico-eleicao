<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('eleicoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('escola_id')->constrained('escolas')->onDelete('cascade');
            $table->foreignId('admin_id')->constrained('administradores')->onDelete('cascade');
            $table->dateTime('data_inicio');
            $table->dateTime('data_fim');
            $table->enum('status', ['aberta', 'encerrada', 'aguardando'])->default('aguardando');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eleicaos');
    }
};
