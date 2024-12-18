<?php

namespace App\Http\Requests\Content;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateContentRequest extends FormRequest
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
        $type = ['pdf', 'video', 'docx', 'pptx', 'xls'];
        return [
            'lesson_id' => ['required', 'integer', 'exists:lessons,id'],
            'title' => ['required', 'string'],
            'type' => ['required', Rule::in($type)],
            'file' => ['required']
        ];
    }
}
