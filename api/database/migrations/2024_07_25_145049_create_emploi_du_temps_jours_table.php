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
        Schema::create('emploi_du_temps_jours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emploi_du_temps_id');
            $table->unsignedBigInteger('jour_id');
            $table->timestamps();

             // Clés étrangères
             $table->foreign('emploi_du_temps_id')->references('id')->on('emploi_du_temps')->onDelete('cascade');
             $table->foreign('jour_id')->references('id')->on('jours')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emploi_du_temps_jours');
    }
};
