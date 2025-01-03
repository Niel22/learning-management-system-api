<?php

namespace App\Http\Requests\Quiz;

use App\Models\Assessment\Quiz;
use Illuminate\Foundation\Http\FormRequest;

class CreateQuizRequest extends FormRequest
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
            'title' => ['required', 'String', 
                function($atrribute, $value, $fail)
                {
                    $value = $this->route('course');

                    if(Quiz::where('course_id', $value)->exists())
                    {
                        $fail('This course cannot have more than one quiz');
                    }
                }
            ],
            'description' => ['required', 'min:25']
        ];
    }
}
