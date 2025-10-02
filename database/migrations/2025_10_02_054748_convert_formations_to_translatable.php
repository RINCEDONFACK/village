<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Table de traduction pour IT Trainings
        Schema::create('it_training_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('it_training_id')->constrained('it_trainings')->onDelete('cascade');
            $table->string('locale', 2); // 'fr', 'en'
            $table->string('titre');
            $table->text('description');
            $table->unique(['it_training_id', 'locale']);
            $table->timestamps();
        });

        // Migrer les données existantes
        $trainings = DB::table('it_trainings')->get();
        foreach ($trainings as $training) {
            DB::table('it_training_translations')->insert([
                'it_training_id' => $training->id,
                'locale' => 'fr',
                'titre' => $training->titre,
                'description' => $training->description,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // Version anglaise (à traduire plus tard)
            DB::table('it_training_translations')->insert([
                'it_training_id' => $training->id,
                'locale' => 'en',
                'titre' => $training->titre,
                'description' => $training->description,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // 2. Table de traduction pour Cultures
        Schema::create('culture_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('culture_id')->constrained('cultures')->onDelete('cascade');
            $table->string('locale', 2);
            $table->string('titre');
            $table->text('description')->nullable();
            $table->unique(['culture_id', 'locale']);
            $table->timestamps();
        });

        // Migrer les données
        $cultures = DB::table('cultures')->get();
        foreach ($cultures as $culture) {
            DB::table('culture_translations')->insert([
                'culture_id' => $culture->id,
                'locale' => 'fr',
                'titre' => $culture->titre,
                'description' => $culture->description,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            DB::table('culture_translations')->insert([
                'culture_id' => $culture->id,
                'locale' => 'en',
                'titre' => $culture->titre,
                'description' => $culture->description,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // 3. Table de traduction pour Women Empowerment
        Schema::create('women_emporment_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('women_emporment_id')->constrained('women_emporments')->onDelete('cascade');
            $table->string('locale', 2);
            $table->string('title');
            $table->text('edition')->nullable();
            $table->text('description')->nullable();
            $table->unique(['women_emporment_id', 'locale']);
            $table->timestamps();
        });

        // Migrer les données
        $women = DB::table('women_emporments')->get();
        foreach ($women as $woman) {
            DB::table('women_emporment_translations')->insert([
                'women_emporment_id' => $woman->id,
                'locale' => 'fr',
                'title' => $woman->title,
                'edition' => $woman->edition,
                'description' => $woman->description,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            DB::table('women_emporment_translations')->insert([
                'women_emporment_id' => $woman->id,
                'locale' => 'en',
                'title' => $woman->title,
                'edition' => $woman->edition,
                'description' => $woman->description,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // 4. Table de traduction pour Teams
        Schema::create('team_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained('teams')->onDelete('cascade');
            $table->string('locale', 2);
            $table->string('fonction');
            $table->text('presentation')->nullable();
            $table->unique(['team_id', 'locale']);
            $table->timestamps();
        });

        // Migrer les données
        $teams = DB::table('teams')->get();
        foreach ($teams as $team) {
            DB::table('team_translations')->insert([
                'team_id' => $team->id,
                'locale' => 'fr',
                'fonction' => $team->fonction,
                'presentation' => $team->presentation,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            DB::table('team_translations')->insert([
                'team_id' => $team->id,
                'locale' => 'en',
                'fonction' => $team->fonction,
                'presentation' => $team->presentation,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // Supprimer les colonnes traduisibles des tables principales
        Schema::table('it_trainings', function (Blueprint $table) {
            $table->dropColumn(['titre', 'description']);
        });

        Schema::table('cultures', function (Blueprint $table) {
            $table->dropColumn(['titre', 'description']);
        });

        Schema::table('women_emporments', function (Blueprint $table) {
            $table->dropColumn(['title', 'edition', 'description']);
        });

        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn(['fonction', 'presentation']);
        });
    }

    public function down(): void
    {
        // Restaurer les colonnes
        Schema::table('it_trainings', function (Blueprint $table) {
            $table->string('titre')->nullable();
            $table->text('description')->nullable();
        });

        Schema::table('cultures', function (Blueprint $table) {
            $table->string('titre')->nullable();
            $table->text('description')->nullable();
        });

        Schema::table('women_emporments', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->text('edition')->nullable();
            $table->text('description')->nullable();
        });

        Schema::table('teams', function (Blueprint $table) {
            $table->string('fonction')->nullable();
            $table->text('presentation')->nullable();
        });

        // Supprimer les tables de traduction
        Schema::dropIfExists('team_translations');
        Schema::dropIfExists('women_emporment_translations');
        Schema::dropIfExists('culture_translations');
        Schema::dropIfExists('it_training_translations');
    }
};
