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
        Schema::create('enseignant_classe', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('enseignant_id');
            $table->unsignedBigInteger('classe_id');
            $table->unsignedInteger('matiere_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enseignant_classe');
    }
};
