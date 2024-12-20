<?php

namespace App\Http\Resources\LessonProgress;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonProgressResource extends JsonResource
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
            'course' => $this->course->title,
            'lesson' => $this->lesson->title,
            'student' => $this->student->name,
            'progress' => ($this->progress/$this->lesson->content->count()) * 100 . '%'
        ];
    }
}
