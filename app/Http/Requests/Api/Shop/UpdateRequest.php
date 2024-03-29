<?php

namespace App\Http\Requests\Api\Shop;

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
            'name'        => 'nullable|string|unique:shops,name,except,id',
            // 'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'lang'    => 'nullable|string',
            'late'    => 'nullable|string',
            'phone'       => 'nullable',
            'description' => 'nullable|string|max:500',
        ];
    }
}
