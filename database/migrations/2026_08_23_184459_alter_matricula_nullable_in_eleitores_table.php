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
        Schema::table('eleitores', function (Blueprint $table) {
            $table->string('matricula', 20)->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('eleitores', function (Blueprint $table) {
            $table->string('matricula', 20)->nullable(false)->change();
        });
    }
};
