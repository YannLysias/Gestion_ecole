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
        Schema::create('eleves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('matricule');
            $table->integer('edu_master');
            $table->date('date_naissance');
            $table->string('lieu_naissance');
            $table->boolean('statut')->default(false);
            $table->string('photo');
            $table->integer('tuteur_id')->index('tuteur_id');
            $table->timestamps();
            $table->integer('classe_id')->index('classe_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eleves');
    }
};
