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
        Schema::create('emails', function (Blueprint $table) {
        $table->id();
        $table->string('message_id')->unique();
        $table->string('subject')->nullable();
        $table->longText('body')->nullable();
        $table->string('from_email')->nullable();
        $table->string('from_name')->nullable();
        $table->string('to_email')->nullable();
        $table->timestamp('date')->nullable();
        $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emails');
    }
};
