<?php

namespace App\Http\Resources\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'Thumbnail' => url($this->thumbnail),
            'instructor' => $this->instructor->name,
            'category' => $this->category->name,
            'lessons' => $this->lessons->map(function($lesson, $index){
                return [
                    'id' => $lesson->id,
                    'title' => $lesson->title,
                    'slug' => $lesson->slug,
                    'order' => 'Lesson '. $lesson->order,
                    'duration' => $lesson->duration . ' Minutes'
                ];
            }),
        ];
    }
}
