<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceRequest extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_name',
        'contact_person',
        'phone',
        'email',
        'business_nature',
        'address',
        'booking_date',
        'booking_time',
        'services_requested',
        'consultation_type',
        'additional_notes',
        'status',
        'total_services',
        'estimated_duration',
        'preferred_consultant',
        'urgency_level',
        'budget_range',
        'previous_experience',
        'special_requirements'
    ];

    protected $casts = [
        'booking_date' => 'date',
        'booking_time' => 'datetime',
        'services_requested' => 'array',
        'estimated_duration' => 'integer',
        'previous_experience' => 'boolean'
    ];

    // Available consultation services
    public static function getAvailableServices()
    {
        return [
            'asset_management' => 'Asset Management & Reliability Services',
            'consultation' => 'Consultation Services',
            'training' => 'Training Services',
            'professional_manpower' => 'Professional Manpower Supply',
            'arbitration' => 'Arbitration Services',
            'iso_55001' => 'ISO 55001:2014 Implementation',
            'asset_hierarchy' => 'Asset Hierarchy Assessment & Creation',
            'building_kpis' => 'Building Key Performance Indicators (KPIs)',
            'criticality_assessment' => 'Criticality Assessment & Ranking',
            'shutdown_turnaround' => 'Shutdown & Turnaround Planning',
            'reliability_maintenance' => 'Reliability Centered Maintenance',
            'mro_inventory' => 'MRO Inventory and Spare Parts Optimization',
            'maintenance_reliability' => 'Maintenance & Reliability Effectiveness',
            'data_preparation' => 'Data Preparation for EAM Implementation',
            'building_maintenance' => 'Building Maintenance & Asset Management',
            'cmrp' => 'CMRP Certification Program',
            'cama' => 'CAMA Certification Program',
            'shutdown_training' => 'Shutdown & Turnaround Training'
        ];
    }

    // Available consultation types
    public static function getConsultationTypes()
    {
        return [
            'single_service' => 'Single Service Consultation',
            'multiple_services' => 'Multiple Services Consultation',
            'comprehensive' => 'Comprehensive Consultation',
            'specialized' => 'Specialized Consultation',
            'ongoing_support' => 'Ongoing Support & Advisory'
        ];
    }

    // Available statuses
    public static function getStatuses()
    {
        return [
            'pending' => 'Pending Review',
            'confirmed' => 'Confirmed',
            'in_progress' => 'In Progress',
            'completed' => 'Completed',
            'cancelled' => 'Cancelled',
            'rescheduled' => 'Rescheduled'
        ];
    }

    // Available urgency levels
    public static function getUrgencyLevels()
    {
        return [
            'low' => 'Low Priority',
            'medium' => 'Medium Priority',
            'high' => 'High Priority',
            'urgent' => 'Urgent',
            'critical' => 'Critical'
        ];
    }

    // Available budget ranges
    public static function getBudgetRanges()
    {
        return [
            'under_10k' => 'Under 10,000 SAR',
            '10k_25k' => '10,000 - 25,000 SAR',
            '25k_50k' => '25,000 - 50,000 SAR',
            '50k_100k' => '50,000 - 100,000 SAR',
            'over_100k' => 'Over 100,000 SAR',
            'negotiable' => 'Negotiable'
        ];
    }

    // Available time slots
    public static function getAvailableTimeSlots()
    {
        return [
            '09:00' => '9:00 AM',
            '10:00' => '10:00 AM',
            '11:00' => '11:00 AM',
            '12:00' => '12:00 PM',
            '13:00' => '1:00 PM',
            '14:00' => '2:00 PM',
            '15:00' => '3:00 PM',
            '16:00' => '4:00 PM',
            '17:00' => '5:00 PM'
        ];
    }

    // Check if time slot is available
    public static function isTimeSlotAvailable($date, $time)
    {
        return !self::where('booking_date', $date)
            ->where('booking_time', $time)
            ->whereIn('status', ['confirmed', 'in_progress'])
            ->exists();
    }

    // Get available time slots for a specific date
    public static function getAvailableTimeSlotsForDate($date)
    {
        $bookedSlots = self::where('booking_date', $date)
            ->whereIn('status', ['confirmed', 'in_progress'])
            ->pluck('booking_time')
            ->map(function($time) {
                // Handle both string and Carbon time objects
                if (is_string($time)) {
                    return $time;
                }
                return $time->format('H:i');
            })
            ->toArray();

        $allSlots = array_keys(self::getAvailableTimeSlots());
        
        return array_diff($allSlots, $bookedSlots);
    }

    // Calculate estimated duration based on services
    public function calculateEstimatedDuration()
    {
        $baseDuration = 60; // 1 hour base
        $serviceCount = count($this->services_requested ?? []);
        
        if ($serviceCount > 1) {
            $baseDuration += ($serviceCount - 1) * 30; // 30 minutes per additional service
        }
        
        if ($this->consultation_type === 'comprehensive') {
            $baseDuration += 60; // Additional hour for comprehensive consultation
        }
        
        return $baseDuration;
    }

    // Get formatted services list
    public function getFormattedServicesAttribute()
    {
        $services = $this->services_requested ?? [];
        $availableServices = self::getAvailableServices();
        
        return collect($services)->map(function($service) use ($availableServices) {
            return $availableServices[$service] ?? $service;
        })->implode(', ');
    }

    // Get formatted status
    public function getFormattedStatusAttribute()
    {
        $statuses = self::getStatuses();
        return $statuses[$this->status] ?? $this->status;
    }

    // Scope for active requests
    public function scopeActive($query)
    {
        return $query->whereIn('status', ['pending', 'confirmed', 'in_progress']);
    }

    // Scope for pending requests
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    // Scope for confirmed requests
    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    // Scope for today's bookings
    public function scopeToday($query)
    {
        return $query->whereDate('booking_date', today());
    }

    // Scope for upcoming bookings
    public function scopeUpcoming($query)
    {
        return $query->where('booking_date', '>=', today());
    }
}
