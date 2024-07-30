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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('emploi_du_temps_id')->index('emploi_du_temps_jours_emploi_du_temps_id_foreign');
            $table->unsignedBigInteger('jour_id')->index('emploi_du_temps_jours_jour_id_foreign');
            $table->timestamps();
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
