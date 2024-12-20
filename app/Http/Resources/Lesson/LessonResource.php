<?php

namespace App\Http\Resources\Lesson;

use Illuminate\Http\Request;
use App\Http\Resources\Content\ContentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
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
            'slug' => $this->slug,
            'order' => 'Lesson '. $this->order,
            'duration' => $this->duration . ' Minutes',
            'course' => $this->course->title,
        ];
    }
}
