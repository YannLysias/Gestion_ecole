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
        Schema::table('utilisateur_droit', function (Blueprint $table) {
            $table->foreign(['droit_id'])->references(['id'])->on('droits')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['utilisateur_id'])->references(['id'])->on('utilisateurs')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('utilisateur_droit', function (Blueprint $table) {
            $table->dropForeign('utilisateur_droit_droit_id_foreign');
            $table->dropForeign('utilisateur_droit_utilisateur_id_foreign');
        });
    }
};
