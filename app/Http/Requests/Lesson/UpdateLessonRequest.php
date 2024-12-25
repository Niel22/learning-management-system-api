<?php

namespace App\Http\Requests\Lesson;

use App\Models\Course\Lesson;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateLessonRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'order' => ['required', 'integer',
                Rule::unique('lessons', 'order')->where(function($q){
                    $q->where('course_id', $this->route('course'));
                })->ignore($this->route('lesson')),
                function ($attribute, $value, $fail) {
                    $courseId = $this->route('course');

                    if ($value > 1) {

                        $previousOrder = $value - 1;
                        $exists = Lesson::where('course_id', $courseId)
                            ->where('order', $previousOrder)
                            ->exists();

                        if (!$exists) {
                            $fail("The lesson with order {$previousOrder} must exist before creating this lesson.");
                        }
                    }
                }
            ],
            'duration' => ['required', 'integer']
        ];
    }
}
