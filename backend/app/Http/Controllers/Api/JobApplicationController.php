<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller; 
use App\Models\JobApplication;
use Illuminate\Http\Request;
use App\Http\Resources\JobApplicationResource;

class JobApplicationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_id' => 'required|exists:job_vacancies,id',
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'career_track' => 'required|string',
            'experience_years' => 'required|string',
            'expected' => 'required|string|max:50',
            'period' => 'required|string|max:50',
            'motivation' => 'nullable|string',
        ]);

        $application = JobApplication::create($validated);

        return response()->json([
            'success' => true,
            'application' => $application
        ]);
    }

    public function index()
    {
        return JobApplicationResource::collection(
            JobApplication::with('job')->latest()->get()
        );
    }
}
