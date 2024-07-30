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
        Schema::create('matiere_absence', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matiere_id');
            $table->unsignedBigInteger('absence_id');
            $table->timestamps();

             // Clés étrangères
             $table->foreign('matiere_id')->references('id')->on('matieres')->onDelete('cascade');
             $table->foreign('absence_id')->references('id')->on('absences')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matiere_absence');
    }
};
