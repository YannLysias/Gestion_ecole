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
        Schema::create('notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('note');
            $table->unsignedInteger('matiere_id')->index('notes_matiere_id_foreign');
            $table->unsignedBigInteger('periode_id')->index('notes_periode_id_foreign');
            $table->unsignedBigInteger('controle_id')->index('notes_controle_id_foreign');
            $table->unsignedBigInteger('eleve_id')->index('eleve_id');
            $table->unsignedBigInteger('annee_scolaire_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
