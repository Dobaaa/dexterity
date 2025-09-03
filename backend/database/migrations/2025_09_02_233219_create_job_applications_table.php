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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained('job_vacancies')->onDelete('cascade');
            $table->string('full_name');
            $table->string('phone');
            $table->string('email');
            $table->string('career_track');
            $table->string('experience_years');
            $table->string('expected'); // expected monthly net salary
            $table->string('period');   // notice period in weeks
            $table->text('motivation')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
