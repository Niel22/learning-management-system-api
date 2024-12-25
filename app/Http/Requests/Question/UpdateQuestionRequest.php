<?php

namespace App\Http\Requests\Question;

use App\Models\Assessment\Quiz;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'question' => ['required', 
                Rule::unique('questions', 'question')
                    ->where(function($q){
                        $q->where('quiz_id', $this->route('quiz'));
                    })->ignore($this->route('question')),
                ],
        ];
    }
}
