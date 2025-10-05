<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('it_trainings', function (Blueprint $table) {
            // Ajout des nouvelles colonnes
            $table->string('titre')->after('id');
            $table->text('description')->after('titre');
        });
    }

    public function down(): void
    {
        Schema::table('it_trainings', function (Blueprint $table) {
            // Suppression des colonnes en cas de rollback
            $table->dropColumn(['titre', 'description']);
        });
    }
};
