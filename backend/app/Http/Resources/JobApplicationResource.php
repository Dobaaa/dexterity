<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobApplicationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'career_track' => $this->career_track,
            'experience_years' => $this->experience_years,
            'expected' => $this->expected,
            'period' => $this->period,
            'motivation' => $this->motivation,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'job' => [
                'id' => $this->job->id,
                'title' => $this->job->title,
                'description' => $this->job->description,
                'requirements' => $this->job->requirements,
            ]
        ];
    }
}
