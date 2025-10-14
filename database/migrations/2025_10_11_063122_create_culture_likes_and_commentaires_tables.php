<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Table pour les likes de culture
        Schema::create('culture_likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('culture_id')->constrained('cultures')->onDelete('cascade');
            $table->string('ip_address');
            $table->string('user_agent')->nullable();
            $table->timestamps();

            $table->unique(['culture_id', 'ip_address']);
        });

         Schema::create('culture_commentaires', function (Blueprint $table) {
            $table->id();
            $table->foreignId('culture_id')->constrained()->onDelete('cascade');
            $table->foreignId('parent_id')->nullable()->constrained('culture_commentaires')->onDelete('cascade');
            $table->string('auteur');
            $table->string('email')->nullable();
            $table->string('photo')->nullable();
            $table->text('contenu');
            $table->boolean('is_approved')->default(false);
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();

            $table->index('parent_id');
            $table->index('is_approved');
        });


    }

    public function down(): void
    {
        Schema::table('cultures', function (Blueprint $table) {
            $table->dropColumn('likes_count');
        });

        Schema::dropIfExists('culture_commentaires');
        Schema::dropIfExists('culture_likes');
    }
};
