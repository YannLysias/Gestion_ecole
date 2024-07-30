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
        Schema::table('classe_salle', function (Blueprint $table) {
            $table->foreign(['classe_id'])->references(['id'])->on('classes')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['salle_id'])->references(['id'])->on('salles')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('classe_salle', function (Blueprint $table) {
            $table->dropForeign('classe_salle_classe_id_foreign');
            $table->dropForeign('classe_salle_salle_id_foreign');
        });
    }
};
