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
        Schema::table('emploi_du_temps_jours', function (Blueprint $table) {
            $table->foreign(['emploi_du_temps_id'])->references(['id'])->on('emploi_du_temps')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['jour_id'])->references(['id'])->on('jours')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('emploi_du_temps_jours', function (Blueprint $table) {
            $table->dropForeign('emploi_du_temps_jours_emploi_du_temps_id_foreign');
            $table->dropForeign('emploi_du_temps_jours_jour_id_foreign');
        });
    }
};
