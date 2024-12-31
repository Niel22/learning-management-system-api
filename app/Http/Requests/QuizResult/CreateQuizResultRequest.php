<?php

namespace App\Http\Requests\QuizResult;

use App\Models\Assessment\Question;
use App\Models\Assessment\QuizResult;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class CreateQuizResultRequest extends FormRequest
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
            'student_id' => ['required', 'exists:users,id',
                function($attribute, $value, $fail)
                {
                    if(Auth::id() != $value)
                    {
                        $fail('The user passed is not authenticated');
                    }

                    if(QuizResult::where('student_id', $value)->where('quiz_id', $this->route('quiz'))->exists())
                    {
                        $fail('Student Already took this quiz');
                    }
                }
            ],
            'answers' => ['required', 'array', 
                function($attribute, $value, $fail)
                {
                    if(count($value) != Question::where('quiz_id', $this->route('quiz'))->count())
                    {
                        $fail('Ensure you answer all questions');
                    }
                }
            ],
            'answers.*.answer_id' => ['required', 'integer', 'exists:options,id'],
            'answers.*.question_id' => ['required', 'integer', 'exists:questions,id'],
        ];
    }
}
