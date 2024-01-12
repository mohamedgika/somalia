<?php

namespace App\Http\Requests\Dashboard\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name_category' => 'required|string|min:3',
            'name_subcategory' => 'required|string|min:3',
            'image_category' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_subcategory' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'inputs' => 'required|array',
            'inputs.*.input' => 'required|string|max:255',
            'inputs.*.type' => ['required', 'string'],
        ];
    }
}
