<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cultures', function (Blueprint $table) {
            $table->string('titre')->after('reference');
            $table->text('description')->nullable()->after('titre');
        });
    }

    public function down(): void
    {
        Schema::table('cultures', function (Blueprint $table) {
            $table->dropColumn(['titre', 'description']);
        });
    }
};
