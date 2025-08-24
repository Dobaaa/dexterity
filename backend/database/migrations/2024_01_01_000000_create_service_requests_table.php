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
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('contact_person');
            $table->string('phone');
            $table->string('email');
            $table->string('business_nature');
            $table->text('address');
            $table->date('booking_date');
            $table->time('booking_time');
            $table->json('services_requested');
            $table->string('consultation_type');
            $table->text('additional_notes')->nullable();
            $table->enum('status', ['pending', 'confirmed', 'in_progress', 'completed', 'cancelled', 'rescheduled'])->default('pending');
            $table->integer('total_services')->default(0);
            $table->integer('estimated_duration')->nullable(); // in minutes
            $table->string('preferred_consultant')->nullable();
            $table->enum('urgency_level', ['low', 'medium', 'high', 'urgent', 'critical'])->default('medium');
            $table->enum('budget_range', ['under_10k', '10k_25k', '25k_50k', '50k_100k', 'over_100k', 'negotiable'])->nullable();
            $table->boolean('previous_experience')->default(false);
            $table->text('special_requirements')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Indexes for better performance
            $table->index(['booking_date', 'booking_time']);
            $table->index('status');
            $table->index('company_name');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};

