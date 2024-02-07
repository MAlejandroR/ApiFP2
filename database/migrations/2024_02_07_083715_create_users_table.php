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

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('login', 50)->unique();
            $table->string('userName', 20)->nullable();
            $table->string('surname', 100)->nullable();
            $table->string('email', 70)->nullable();
            $table->string('linkedIn', 30)->nullable();
            $table->foreignId('entities_id')->constrained('entities');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
