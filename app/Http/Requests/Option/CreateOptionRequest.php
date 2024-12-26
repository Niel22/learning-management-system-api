<?php

namespace App\Http\Requests\Option;

use App\Models\Assessment\Option;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateOptionRequest extends FormRequest
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
            'options' => ['required', 'array', 'size:4'], 
            'options.*.option' => [
                'required',
                'string',
                Rule::unique('options', 'option')->where(function ($q) {
                    $q->where('question_id', $this->route('question'));
                }),
            ],
            'options.*.is_correct' => ['required', 'boolean'],
        ];
        
    }
}
