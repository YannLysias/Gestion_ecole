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
        Schema::create('classe_salle', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('classe_id')->index('classe_salle_classe_id_foreign');
            $table->unsignedBigInteger('salle_id')->index('classe_salle_salle_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classe_salle');
    }
};
