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
        Schema::table('notes', function (Blueprint $table) {
            $table->foreign('matiere_id')->references('id')->on('matieres')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign('periode_id')->references('id')->on('periodes')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign('controle_id')->references('id')->on('controles')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign('eleve_id')->references('id')->on('eleves')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign('annee_scolaire_id')->references('id')->on('annee_scolaires')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->dropForeign('matiere_id');
            $table->dropForeign('periode_id');
            $table->dropForeign('controle_id');
            $table->dropForeign('eleve_id');
            
        });
    }
};
