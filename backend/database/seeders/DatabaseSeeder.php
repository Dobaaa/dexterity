<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create sample data for testing
        \App\Models\News::factory(5)->create();
        \App\Models\Service::factory(8)->create();
        \App\Models\Job::factory(3)->create();
        \App\Models\Contact::factory(10)->create();
        
        // Create sample service requests
        \App\Models\ServiceRequest::factory(15)->create();
        \App\Models\ServiceRequest::factory(5)->pending()->create();
        \App\Models\ServiceRequest::factory(3)->confirmed()->create();
        \App\Models\ServiceRequest::factory(2)->urgent()->create();
    }
}
