<?php

namespace App\Http\Requests\Content;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateContentRequest extends FormRequest
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
            'lesson_id' => ['nullable', 'integer', 'exists:lessons,id'],
            'title' => ['nullable', 'string'],
            'type' => ['nullable', Rule::in($type)],
            'file' => ['nullable']
        ];
    }
}
