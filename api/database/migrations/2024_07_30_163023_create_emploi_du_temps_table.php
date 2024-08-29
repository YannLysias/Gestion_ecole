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
            $table->increments('id');
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->timestamps();
            $table->unsignedBigInteger('classe_id');
            $table->unsignedBigInteger('annee_scolaire_id');
            $table->unsignedInteger('jour_id');
            $table->unsignedInteger('matiere_id');
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
