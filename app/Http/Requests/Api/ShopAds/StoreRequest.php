<?php

namespace App\Http\Requests\Api\ShopAds;

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
            //Ads
            'name'=>'required|string',
            'price'=>'required|numeric',
            'image' => 'required|array',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description'=>'nullable|string|max:500',
            'feature'=>'nullable|string|max:500',
            'country'=>'nullable|string',
            'state'=>'nullable|string',
            // 'country'=>'required|string',
            // 'state'=>'required|string',
            'city'=>'nullable|string',
            'lang'    => 'required|string',
            'late'    => 'required|string',
            //ShopAdDetail
            'shop_ad_detail'=>'nullable|json',
            ];
    }
}
