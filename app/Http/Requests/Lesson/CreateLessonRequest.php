<?php

namespace App\Http\Requests\Lesson;

use App\Models\Course\Lesson;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateLessonRequest extends FormRequest
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
            'title' => ['required', 'string',
                Rule::unique('lessons', 'title')->where(function ($q) {
                    $q->where('module_id', $this->route('module'));
                })
            ],
            'duration' => ['required', 'integer'],
            'content_type' => ['required', 'string'],
            'file' => ['required']
        ];
    }
}
