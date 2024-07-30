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
        Schema::create('emploi_du_temps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->timestamps();
            $table->integer('classe_id')->index('classe_id');
            $table->integer('annee_scolaire_id')->index('annee_scolaire_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emploi_du_temps');
    }
};
