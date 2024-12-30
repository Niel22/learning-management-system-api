<?php

namespace App\Http\Requests\Enrollment;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'course_id' => ['required', 'exists:courses,id',
                Rule::unique('enrollments', 'course_id')->where(function($q){
                    $q->where('student_id', $this->route('student'));
                })
            ],
            'status' => ['nullable', 'string'],
        ];
    }
}
