<?php

namespace App\Http\Requests\Todo;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'task_name' => 'required',
            'description' => 'nullable',
            'issue_path' => 'nullable|mimes:png,jpg,jpeg,pdf|max:2048',
            'is_complete' => 'required|in:0,1'
        ];
    }
}
