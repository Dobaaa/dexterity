<?php

namespace Database\Factories;

use App\Models\ServiceRequest;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceRequest>
 */
class ServiceRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $businessNatures = ['manufacturing', 'oil_gas', 'petrochemical', 'mining', 'utilities', 'construction', 'healthcare', 'education', 'government', 'other'];
        $consultationTypes = ['single_service', 'multiple_services', 'comprehensive', 'specialized', 'ongoing_support'];
        $urgencyLevels = ['low', 'medium', 'high', 'urgent', 'critical'];
        $budgetRanges = ['under_10k', '10k_25k', '25k_50k', '50k_100k', 'over_100k', 'negotiable'];
        $statuses = ['pending', 'confirmed', 'in_progress', 'completed', 'cancelled', 'rescheduled'];
        
        $availableServices = array_keys(ServiceRequest::getAvailableServices());
        $selectedServices = $this->faker->randomElements($availableServices, $this->faker->numberBetween(1, 5));
        
        $bookingDate = $this->faker->dateTimeBetween('+1 day', '+3 months');
        $timeSlots = array_keys(ServiceRequest::getAvailableTimeSlots());
        $bookingTime = $this->faker->randomElement($timeSlots);

        return [
            'company_name' => $this->faker->company(),
            'contact_person' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->companyEmail(),
            'business_nature' => $this->faker->randomElement($businessNatures),
            'address' => $this->faker->address(),
            'booking_date' => $bookingDate->format('Y-m-d'),
            'booking_time' => $bookingTime,
            'services_requested' => $selectedServices,
            'consultation_type' => $this->faker->randomElement($consultationTypes),
            'additional_notes' => $this->faker->optional(0.7)->paragraph(),
            'status' => $this->faker->randomElement($statuses),
            'total_services' => count($selectedServices),
            'estimated_duration' => $this->faker->numberBetween(60, 240), // 1-4 hours in minutes
            'preferred_consultant' => $this->faker->optional(0.3)->name(),
            'urgency_level' => $this->faker->randomElement($urgencyLevels),
            'budget_range' => $this->faker->randomElement($budgetRanges),
            'previous_experience' => $this->faker->boolean(30), // 30% chance of having experience
            'special_requirements' => $this->faker->optional(0.4)->paragraph(),
        ];
    }

    /**
     * Indicate that the service request is pending.
     */
    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'pending',
        ]);
    }

    /**
     * Indicate that the service request is confirmed.
     */
    public function confirmed(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'confirmed',
        ]);
    }

    /**
     * Indicate that the service request is urgent.
     */
    public function urgent(): static
    {
        return $this->state(fn (array $attributes) => [
            'urgency_level' => 'urgent',
        ]);
    }

    /**
     * Indicate that the service request is for today.
     */
    public function today(): static
    {
        return $this->state(fn (array $attributes) => [
            'booking_date' => Carbon::today()->format('Y-m-d'),
        ]);
    }

    /**
     * Indicate that the service request is for tomorrow.
     */
    public function tomorrow(): static
    {
        return $this->state(fn (array $attributes) => [
            'booking_date' => Carbon::tomorrow()->format('Y-m-d'),
        ]);
    }

    /**
     * Indicate that the service request is comprehensive.
     */
    public function comprehensive(): static
    {
        return $this->state(fn (array $attributes) => [
            'consultation_type' => 'comprehensive',
            'services_requested' => array_slice(array_keys(ServiceRequest::getAvailableServices()), 0, 8), // Select 8 services
        ]);
    }
}

