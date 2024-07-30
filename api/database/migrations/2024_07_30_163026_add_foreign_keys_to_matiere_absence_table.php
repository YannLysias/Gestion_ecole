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
        Schema::table('matiere_absence', function (Blueprint $table) {
            $table->foreign(['absence_id'])->references(['id'])->on('absences')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['matiere_id'])->references(['id'])->on('matieres')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('matiere_absence', function (Blueprint $table) {
            $table->dropForeign('matiere_absence_absence_id_foreign');
            $table->dropForeign('matiere_absence_matiere_id_foreign');
        });
    }
};
