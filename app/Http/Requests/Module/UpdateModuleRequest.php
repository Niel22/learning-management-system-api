<?php

namespace App\Http\Requests\Module;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateModuleRequest extends FormRequest
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
            'title' => ['required', 
                Rule::unique('modules', 'title')
                    ->where(function($q){
                        $q->where('course_id', $this->route('course'));
                    })->ignore($this->route('module'))
                ],
            'description' => ['required']
        ];
    }
}
