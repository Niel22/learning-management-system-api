<?php

namespace App\Http\Requests\Enrollment;

use GuzzleHttp\Psr7\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class EnrollmentRequest extends FormRequest
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
                    if($value != Auth::id())
                    {
                        $fail('This user id is not currently authenticated');
                    }
                }
            ],
            'course_id' => ['required', 'exists:courses,id',
                Rule::unique('enrollments', 'course_id')->where(function($q){
                    $q->where('student_id', Request('student_id'));
                })
            ],
            'status' => ['nullable', 'string'],
        ];
    }
}
