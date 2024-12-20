<?php

namespace App\Http\Resources\CourseProgress;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseProgressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Student' => $this->student->name,
            'Course' => $this->course->title,
            'progress' => ($this->progress/$this->course->lessons->count())* 100 . '%',
            'Completed' => $this->is_completed ? True : False,
        ];
    }
}
