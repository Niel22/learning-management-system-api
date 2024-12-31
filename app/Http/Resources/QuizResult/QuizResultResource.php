<?php

namespace App\Http\Resources\QuizResult;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizResultResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'student' => $this->student->name,
            'quiz' => $this->quiz->title,
            'score' => $this->score. "/" . $this->quiz->question->count()
        ];
    }
}
