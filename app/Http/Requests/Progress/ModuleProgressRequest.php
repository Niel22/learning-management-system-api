<?php

namespace App\Http\Requests\Progress;

use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ModuleProgressRequest extends FormRequest
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
            'course_id' => ['required', 'integer', 'exists:courses,id',
                function($attribute, $value, $fail)
                {
                    if(!Enrollment::where('student_id', Auth::id())->where('course_id', $value)->exists())
                    {
                        $fail('You havent enrolled for this course');
                    }
                }
            ]
        ];
    }
}
