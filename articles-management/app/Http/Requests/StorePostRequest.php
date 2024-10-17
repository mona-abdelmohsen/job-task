<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
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
            //
            'title' => ['required', 'min:3', 'string', Rule::unique('posts')],
            'content' => ['required', 'min:10', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            //
            'title.required' => 'title is required',
            'title.min' => 'title must be more than 3 characters',
            'title.unique' => 'title must be unique',
            'content.required' =>'content is required',
            'content.min' => 'content must be more than 10 characters',
        ];
    }
}
