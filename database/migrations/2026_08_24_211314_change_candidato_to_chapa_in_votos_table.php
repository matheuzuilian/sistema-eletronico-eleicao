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
    Schema::table('votos', function (Blueprint $table) {
        $table->dropForeign(['candidato_id']);
        $table->dropColumn('candidato_id');
        $table->foreignId('chapa_id')->constrained('chapas')->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::table('votos', function (Blueprint $table) {
        $table->dropForeign(['chapa_id']);
        $table->dropColumn('chapa_id');
        $table->foreignId('candidato_id')->constrained('candidatos')->onDelete('cascade');
    });
}
};
