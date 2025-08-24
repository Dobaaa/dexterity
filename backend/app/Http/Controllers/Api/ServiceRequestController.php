<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServiceRequestController extends Controller
{
    /**
     * Display a listing of service requests
     */
    public function index()
    {
        try {
            $serviceRequests = ServiceRequest::with([])
                ->orderBy('created_at', 'desc')
                ->paginate(15);

            return response()->json([
                'success' => true,
                'message' => 'Service requests retrieved successfully',
                'data' => $serviceRequests
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error retrieving service requests',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created service request
     */
    public function store(Request $request)
    {
        try {
            // Validate the request
            $validator = Validator::make($request->all(), [
                'company_name' => 'required|string|max:255',
                'contact_person' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'business_nature' => 'required|string|max:255',
                'address' => 'required|string',
                'booking_date' => 'required|date|after:today',
                'booking_time' => 'required|string',
                'services_requested' => 'required|array|min:1',
                'services_requested.*' => 'string',
                'consultation_type' => 'required|string|max:255',
                'urgency_level' => 'nullable|string|in:low,medium,high,urgent,critical',
                'budget_range' => 'nullable|string|in:under_10k,10k_25k,25k_50k,50k_100k,over_100k,negotiable',
                'previous_experience' => 'nullable|boolean',
                'preferred_consultant' => 'nullable|string|max:255',
                'special_requirements' => 'nullable|string',
                'additional_notes' => 'nullable|string'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Check if the time slot is available
            if (!ServiceRequest::isTimeSlotAvailable($request->booking_date, $request->booking_time)) {
                return response()->json([
                    'success' => false,
                    'message' => 'This time slot is not available. Please select another time.',
                    'available_slots' => ServiceRequest::getAvailableTimeSlotsForDate($request->booking_date)
                ], 409);
            }

            // Create the service request
            $serviceRequest = ServiceRequest::create([
                'company_name' => $request->company_name,
                'contact_person' => $request->contact_person,
                'phone' => $request->phone,
                'email' => $request->email,
                'business_nature' => $request->business_nature,
                'address' => $request->address,
                'booking_date' => $request->booking_date,
                'booking_time' => $request->booking_time,
                'services_requested' => $request->services_requested,
                'consultation_type' => $request->consultation_type,
                'urgency_level' => $request->urgency_level ?? 'medium',
                'budget_range' => $request->budget_range,
                'previous_experience' => $request->previous_experience ?? false,
                'preferred_consultant' => $request->preferred_consultant,
                'special_requirements' => $request->special_requirements,
                'additional_notes' => $request->additional_notes,
                'total_services' => count($request->services_requested),
                'status' => 'pending'
            ]);

            // Calculate estimated duration
            $serviceRequest->estimated_duration = $serviceRequest->calculateEstimatedDuration();
            $serviceRequest->save();

            return response()->json([
                'success' => true,
                'message' => 'Service request created successfully',
                'data' => $serviceRequest,
                'estimated_duration' => $serviceRequest->estimated_duration . ' minutes'
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creating service request',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified service request
     */
    public function show($id)
    {
        try {
            $serviceRequest = ServiceRequest::findOrFail($id);

            return response()->json([
                'success' => true,
                'message' => 'Service request retrieved successfully',
                'data' => $serviceRequest
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Service request not found',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Update the specified service request
     */
    public function update(Request $request, $id)
    {
        try {
            $serviceRequest = ServiceRequest::findOrFail($id);

            // Validate the request
            $validator = Validator::make($request->all(), [
                'company_name' => 'sometimes|required|string|max:255',
                'contact_person' => 'sometimes|required|string|max:255',
                'phone' => 'sometimes|required|string|max:20',
                'email' => 'sometimes|required|email|max:255',
                'business_nature' => 'sometimes|required|string|max:255',
                'address' => 'sometimes|required|string',
                'booking_date' => 'sometimes|required|date',
                'booking_time' => 'sometimes|required|string',
                'services_requested' => 'sometimes|required|array|min:1',
                'consultation_type' => 'sometimes|required|string|max:255',
                'status' => 'sometimes|required|string|in:pending,confirmed,in_progress,completed,cancelled,rescheduled',
                'urgency_level' => 'sometimes|nullable|string|in:low,medium,high,urgent,critical',
                'budget_range' => 'sometimes|nullable|string|in:under_10k,10k_25k,25k_50k,50k_100k,over_100k,negotiable',
                'previous_experience' => 'sometimes|nullable|boolean',
                'preferred_consultant' => 'sometimes|nullable|string|max:255',
                'special_requirements' => 'sometimes|nullable|string',
                'additional_notes' => 'sometimes|nullable|string'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Check availability if date/time is being changed
            if ($request->has('booking_date') || $request->has('booking_time')) {
                $newDate = $request->booking_date ?? $serviceRequest->booking_date;
                $newTime = $request->booking_time ?? $serviceRequest->booking_time;
                
                if (!ServiceRequest::isTimeSlotAvailable($newDate, $newTime) || 
                    ($newDate == $serviceRequest->booking_date && $newTime == $serviceRequest->booking_time)) {
                    return response()->json([
                        'success' => false,
                        'message' => 'This time slot is not available. Please select another time.',
                        'available_slots' => ServiceRequest::getAvailableTimeSlotsForDate($newDate)
                    ], 409);
                }
            }

            // Update the service request
            $serviceRequest->update($request->all());

            // Recalculate estimated duration if services changed
            if ($request->has('services_requested')) {
                $serviceRequest->total_services = count($request->services_requested);
                $serviceRequest->estimated_duration = $serviceRequest->calculateEstimatedDuration();
                $serviceRequest->save();
            }

            return response()->json([
                'success' => true,
                'message' => 'Service request updated successfully',
                'data' => $serviceRequest
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating service request',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified service request
     */
    public function destroy($id)
    {
        try {
            $serviceRequest = ServiceRequest::findOrFail($id);
            $serviceRequest->delete();

            return response()->json([
                'success' => true,
                'message' => 'Service request deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting service request',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Check availability for a specific date and time
     */
    public function checkAvailability(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'date' => 'required|date|after:today',
                'time' => 'required|string'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $isAvailable = ServiceRequest::isTimeSlotAvailable($request->date, $request->time);
            $availableSlots = ServiceRequest::getAvailableTimeSlotsForDate($request->date);

            return response()->json([
                'success' => true,
                'data' => [
                    'date' => $request->date,
                    'time' => $request->time,
                    'is_available' => $isAvailable,
                    'available_slots' => $availableSlots
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error checking availability',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get available time slots for a specific date
     */
    public function getAvailableTimeSlots(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'date' => 'required|date|after:today'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $availableSlots = ServiceRequest::getAvailableTimeSlotsForDate($request->date);
            $allSlots = ServiceRequest::getAvailableTimeSlots();

            return response()->json([
                'success' => true,
                'data' => [
                    'date' => $request->date,
                    'available_slots' => $availableSlots,
                    'all_slots' => $allSlots
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error getting available time slots',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get service request statistics
     */
    public function getStatistics()
    {
        try {
            $stats = [
                'total_requests' => ServiceRequest::count(),
                'pending_requests' => ServiceRequest::pending()->count(),
                'confirmed_requests' => ServiceRequest::confirmed()->count(),
                'today_bookings' => ServiceRequest::today()->count(),
                'upcoming_bookings' => ServiceRequest::upcoming()->count(),
                'status_distribution' => ServiceRequest::select('status', DB::raw('count(*) as count'))
                    ->groupBy('status')
                    ->get(),
                'business_nature_distribution' => ServiceRequest::select('business_nature', DB::raw('count(*) as count'))
                    ->groupBy('business_nature')
                    ->orderBy('count', 'desc')
                    ->limit(10)
                    ->get()
            ];

            return response()->json([
                'success' => true,
                'message' => 'Statistics retrieved successfully',
                'data' => $stats
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error retrieving statistics',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update service request status
     */
    public function updateStatus(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'status' => 'required|string|in:pending,confirmed,in_progress,completed,cancelled,rescheduled'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $serviceRequest = ServiceRequest::findOrFail($id);
            $serviceRequest->update(['status' => $request->status]);

            return response()->json([
                'success' => true,
                'message' => 'Status updated successfully',
                'data' => $serviceRequest
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating status',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get available services and consultation types
     */
    public function getOptions()
    {
        try {
            $options = [
                'services' => ServiceRequest::getAvailableServices(),
                'consultation_types' => ServiceRequest::getConsultationTypes(),
                'urgency_levels' => ServiceRequest::getUrgencyLevels(),
                'budget_ranges' => ServiceRequest::getBudgetRanges(),
                'time_slots' => ServiceRequest::getAvailableTimeSlots(),
                'business_natures' => [
                    'manufacturing' => 'Manufacturing',
                    'oil_gas' => 'Oil & Gas',
                    'petrochemical' => 'Petrochemical',
                    'mining' => 'Mining',
                    'utilities' => 'Utilities',
                    'construction' => 'Construction',
                    'healthcare' => 'Healthcare',
                    'education' => 'Education',
                    'government' => 'Government',
                    'other' => 'Other'
                ]
            ];

            return response()->json([
                'success' => true,
                'message' => 'Options retrieved successfully',
                'data' => $options
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error retrieving options',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
