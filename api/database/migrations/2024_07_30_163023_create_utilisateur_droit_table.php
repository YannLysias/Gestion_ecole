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
        Schema::create('utilisateur_droit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('utilisateur_id')->index('utilisateur_droit_utilisateur_id_foreign');
            $table->unsignedBigInteger('droit_id')->index('utilisateur_droit_droit_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateur_droit');
    }
};
