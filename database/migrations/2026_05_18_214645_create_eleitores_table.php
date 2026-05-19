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
        Schema::create('eleitores', function (Blueprint $table) {
            $table->id();
            $table->string('matricula', 20)->unique();
            $table->string('tipo', 50);
            $table->string('senha');
            $table->boolean('votou')->default(false);
            $table->foreignId('pessoa_id')->constrained('pessoas')->onDelete('cascade');
            $table->foreignId('escola_id')->constrained('escolas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eleitors');
    }
};
