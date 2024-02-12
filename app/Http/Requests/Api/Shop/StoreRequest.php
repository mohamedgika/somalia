<?php

namespace App\Http\Requests\Api\Shop;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'        => 'required|string|unique:shops,name,except,id',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'lang'    => 'required|string',
            'late'    => 'required|string',
            'phone'       => 'required',
            'description' => 'nullable|string|max:500',
        ];
    }
}
