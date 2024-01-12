<?php

namespace App\Http\Requests\Api\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name'     => 'required|min:3',
            'image'    => 'nullable|image',
            'phone'     => 'nullable|unique:users|max:255',
            'code_phone' => 'nullable',
            'password'  => 'nullable|min:8',
            'confirm_password' => 'nullable',
        ];
    }
}
