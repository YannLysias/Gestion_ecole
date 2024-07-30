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
        Schema::create('matiere_emploi_du_temps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matiere_id');
            $table->unsignedBigInteger('emploi_du_temps_id');
            $table->timestamps();

             // Clés étrangères
             $table->foreign('matiere_id')->references('id')->on('matieres')->onDelete('cascade');
             $table->foreign('emploi_du_temps_id')->references('id')->on('emploi_du_temps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matiere_emploi_du_temps');
    }
};
