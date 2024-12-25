<?php

namespace App\Http\Resources\Question;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
            'quiz' => $this->quiz->title,
            'question' => $this->question,
            'slug' => $this->slug,
        ];
    }
}
