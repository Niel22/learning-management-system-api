<?php

namespace App\Http\Resources\ModuleProgress;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ModuleProgressResource extends JsonResource
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
            'module' => $this->module->title,
            'student' => $this->student->name,
            'progress' => ($this->progress/$this->module->lesson->count()) * 100 . '%',
            'Completed' => $this->progress == $this->module->lesson->count() ? True : False
        ];
    }
}
