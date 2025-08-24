<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceRequestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'company_name' => $this->company_name,
            'contact_person' => $this->contact_person,
            'phone' => $this->phone,
            'email' => $this->email,
            'business_nature' => $this->business_nature,
            'address' => $this->address,
            'booking_date' => $this->booking_date->format('Y-m-d'),
            'booking_time' => $this->booking_time->format('H:i'),
            'services_requested' => $this->services_requested,
            'formatted_services' => $this->formatted_services,
            'consultation_type' => $this->consultation_type,
            'additional_notes' => $this->additional_notes,
            'status' => $this->status,
            'formatted_status' => $this->formatted_status,
            'total_services' => $this->total_services,
            'estimated_duration' => $this->estimated_duration,
            'estimated_duration_formatted' => $this->estimated_duration ? gmdate('H:i', $this->estimated_duration * 60) : null,
            'preferred_consultant' => $this->preferred_consultant,
            'urgency_level' => $this->urgency_level,
            'budget_range' => $this->budget_range,
            'previous_experience' => $this->previous_experience,
            'special_requirements' => $this->special_requirements,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            
            // Additional computed fields
            'is_today' => $this->booking_date->isToday(),
            'is_upcoming' => $this->booking_date->isFuture(),
            'days_until_booking' => $this->booking_date->diffInDays(now()),
            
            // Status indicators
            'is_pending' => $this->status === 'pending',
            'is_confirmed' => $this->status === 'confirmed',
            'is_in_progress' => $this->status === 'in_progress',
            'is_completed' => $this->status === 'completed',
            'is_cancelled' => $this->status === 'cancelled',
            'is_rescheduled' => $this->status === 'rescheduled',
            
            // Urgency indicators
            'is_urgent' => in_array($this->urgency_level, ['urgent', 'critical']),
            'is_high_priority' => in_array($this->urgency_level, ['high', 'urgent', 'critical']),
        ];
    }
}

