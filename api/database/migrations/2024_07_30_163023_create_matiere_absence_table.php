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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('matiere_id')->index('matiere_absence_matiere_id_foreign');
            $table->unsignedBigInteger('absence_id')->index('matiere_absence_absence_id_foreign');
            $table->timestamps();
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
