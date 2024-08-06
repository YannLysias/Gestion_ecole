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
        Schema::table('administrateur_droit', function (Blueprint $table) {
            $table->foreign(['droit_id'])->references(['id'])->on('droits')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['administrateur_id'])->references(['id'])->on('administrateurs')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('administrateur_droit', function (Blueprint $table) {
            $table->dropForeign('administrateur_droit_droit_id_foreign');
            $table->dropForeign('administrateur_droit_administrateur_id_foreign');
        });
    }
};
