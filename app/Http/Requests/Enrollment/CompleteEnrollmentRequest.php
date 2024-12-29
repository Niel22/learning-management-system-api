<?php

namespace App\Http\Requests\Enrollment;

use App\Models\Enrollment;
use Illuminate\Foundation\Http\FormRequest;

class CompleteEnrollmentRequest extends FormRequest
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
            'student_id' => ['required', 'exists:users,id'],
            'course_id' => ['required', 'exists:enrollments,course_id',
                function($attribute, $value, $fail)
                {
                    if(!Enrollment::where('student_id', request('student_id'))->where('course_id', $value)->exists())
                    {
                        $fail('You have not enrolled this course');
                    }
                }
            ],
            'status' => ['required', 'string']
        ];
    }
}
