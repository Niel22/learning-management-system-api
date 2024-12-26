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
            'duration' => $this->duration . ' Minutes',
            'module' => $this->module->title,
            'file' => url($this->file)
        ];
    }
}
