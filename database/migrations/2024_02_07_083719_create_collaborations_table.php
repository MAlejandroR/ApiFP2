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
        Schema::disableForeignKeyConstraints();

        Schema::create('collaborations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('projects_id')->constrained('projects');
            $table->foreignId('users_id')->constrained('users');
            $table->foreignId('families_id')->constrained('families');
            $table->boolean('isManager');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collaborations');
    }
};
