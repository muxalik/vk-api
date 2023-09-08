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
        Schema::create('higher_educations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            $table->foreignId('education_place_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('faculty_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('study_program_id')->nullable()->constrained()->nullOnDelete();
            $table->year('graduation_year')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('higher_educations');
    }
};
