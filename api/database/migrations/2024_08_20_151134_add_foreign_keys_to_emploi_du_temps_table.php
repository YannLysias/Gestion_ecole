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
        Schema::table('emploi_du_temps', function (Blueprint $table) {
            $table->foreign('classe_id')->references('id')->on('classes')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign('annee_scolaire_id')->references('id')->on('annee_scolaires')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign('jour_id')->references('id')->on('jours')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign('matiere_id')->references('id')->on('matieres')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('emploi_du_temps', function (Blueprint $table) {
            $table->dropForeign('classe_id');
            $table->dropForeign('annee_scolaire_id');
            $table->dropForeign('jour_id');
            $table->dropForeign('matiere_id');
        });
    }
};
