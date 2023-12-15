<?php

namespace App\Http\Resources\Api\ShopAdsDetail;

use App\Http\Resources\Api\ShopAds\ShopAdsResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShopAdsDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            =>$this->id,
            'shop_ad_detail'=>json_decode($this->shop_ad_detail),
            'shopad'        => ShopAdsResource::make($this->whenLoaded('shopAds'))
        ];
    }
}
